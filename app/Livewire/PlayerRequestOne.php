<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SeriesMeta;
use App\Models\Event;
use App\Models\Player;
use App\Models\PlayerTeam;

class PlayerRequestOne extends Component
{

    public $event = null;
    public $players = null;
    public $isSeriesClosed = false;

    public $amountForPlayer = 0;
    public $missingAmount = 0;
    

    public function mount($event, $amountForPlayer = 0)
    {
        $this->event = $event;
        $this->amountForPlayer = $amountForPlayer;

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
        
        // Проверяем, есть ли уже игрок в этой команде
        $user = auth()->user();
        $player = Player::query()->where('user_id', '=', $user->id)->first();
        if(in_array($player->id, array_column($this->players, 'id'))){
            session()->flash('error', 'Ви вже в серії!');
            return;
        }

        $balance = $user->balance;
        $this->missingAmount = $this->amountForPlayer - $balance;
        if($balance < $this->amountForPlayer){
            session()->flash('error_balance', "Недостатньо коштів на балансі! Мінімальна сумма $this->amountForPlayer грн.");
            return;
        }

        // записываем игрока в команду
        $this->addPlayer($player->id);

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
