<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SeriesMeta;
use App\Models\Event;
use App\Models\Player;
use App\Models\PlayerTeam;
use App\Models\Team;

class PlayerRequestOne extends Component
{

    public $event = null;
    public $players = null;
    public $isSeriesClosed = false;

    public $playerPrice = 0;
    public $missingAmount = 0;
    public $user = null;
    public $currentPlayer = null;
    

    public function mount($event, $playerPrice = 0)
    {
        $this->event = $event;
        $this->playerPrice = $playerPrice;
        $this->user = auth()->user();
        $this->currentPlayer = Player::query()->where('user_id', $this->user->id)->first();

        $this->isSeriesClosed = SeriesMeta::query()
            ->where('event_id', $this->event->id)
            ->where('status_registration', 'closed')
            ->exists();

       

        $this->loadPlayers();

    }

    public function loadPlayers()
    {        
        $this->players = [];
        $teams = $this->event->teams()->with('players')->get();
        foreach($teams as $team){
            $this->players = array_merge($this->players, $team->players->toArray());
        }
        
        // Проверяем количество игроков в командах
        if(count($this->players) == 18){
            $this->isSeriesClosed = true;
            $this->closeSeries();
        }
    }

    public function BookingPlace()
    {
        
        if(in_array($this->currentPlayer->id, array_column($this->players, 'id'))){
            session()->flash('error', 'Ви вже в серії!');
            return;
        }

        $balance = $this->user->balance;
        $this->missingAmount = $this->playerPrice - $balance;
        if($balance < $this->playerPrice){
            session()->flash('error_balance', "Недостатньо коштів на балансі! Мінімальна сумма $this->playerPrice грн.");
            return;
        }

        // записываем игрока в команду
        $this->addPlayer($this->currentPlayer->id);

        // обновляем компонент
        $this->loadPlayers();
    }

    // Алгоритм добавления игрока в команду
    public function addPlayer($playerId)
    {

        // Отфильтруем команды, где меньше 6 игроков
        $teams = $this->event->teams()
            ->withCount('players')
            ->having('players_count', '<', 6)
            ->get();

        
        // Если нет доступных команд, то закрываем регистрацию
        if ($teams->isEmpty()) {
            $this->isSeriesClosed = true;
            session()->flash('error', 'Всі команди заповнені!');
            $this->closeSeries();
            return;
        }

        // Выбираем первую команду из доступных
        $team = $teams->first();
        $teamId = $team->id;
        $playerNumber = $team->players()->count() + 1;

        // записываем игрока в команду
        PlayerTeam::query()->create([
            'player_id' => $playerId,
            'team_id' => $teamId,
            'status' => 'main',
            'player_number' => $playerNumber,
        ]);
    }

    public function deletePlayer()
    {
        $teamIds = Team::where('event_id', $this->event->id)->pluck('id');

        PlayerTeam::where('player_id', $this->currentPlayer->id)
            ->whereIn('team_id', $teamIds)
            ->first()?->delete(); // безопасный вызов
        session()->flash('success', 'Гравця успішно видалено зі складу.');
        // обновляем компонент
        $this->loadPlayers();
    }



    public function closeSeries()
    {
        // Закрываем регистрацию
        SeriesMeta::query()
            ->where('event_id', $this->event->id)
            ->update(['status_registration' => 'closed']);

        $this->isSeriesClosed = true;
    }  

    public function render()
    {
        return view('livewire.player-request-one');
    }
}
