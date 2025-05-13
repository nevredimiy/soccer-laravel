<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SeriesMeta;
use App\Models\Event;
use App\Models\Player;
use App\Models\PlayerTeam;
use App\Models\Team;
use App\Models\PlayerSeriesRegistration;
use Illuminate\Support\Facades\DB;

class PlayerRequestOne extends Component
{

    public $event = null;
    public $seriesMeta = null;
    public $players = [];
    public $isSeriesClosed = false;

    public $playerPrice = 0;
    public $missingAmount = 0;
    public $user = null;
    public $currentPlayer = null;
    

    public function mount($event, $playerPrice = 0, $seriesMeta)
    {
        $this->event = $event;
        $this->seriesMeta = $seriesMeta;
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

        
        $this->players = []; // очищаем массив для реактивности, что бы компонент обновился
        $playerSeriesRegistration = PlayerSeriesRegistration::query()
            ->with('player.user')
            ->where('series_meta_id', $this->seriesMeta->id)
            ->get()
            ->toArray();
        foreach($playerSeriesRegistration as $item){
            $this->players [] = $item['player'];
        }


        // if($this->isSeriesClosed){
        //     $teams = $this->event->teams()->with('players')->get();
        //     foreach($teams as $team){
        //         $this->players = array_merge($this->players, $team->players->toArray());
        //     }

        // } 

        if(count($this->players) >= 18){
            $this->closeSeries();
            $this->debitFromBalance();
        }else {
            $this->openSeries();
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
    protected function addPlayer($playerId)
    {

        PlayerSeriesRegistration::create([
            'series_meta_id' => $this->seriesMeta->id,
            'player_id' => $playerId
        ]);

        // // Отфильтруем команды, где меньше 6 игроков
        // $teams = $this->event->teams()
        //     ->withCount('players')
        //     ->having('players_count', '<', 6)
        //     ->get();

        
        // // Если нет доступных команд, то закрываем регистрацию
        // if ($teams->isEmpty()) {
        //     $this->isSeriesClosed = true;
        //     session()->flash('error', 'Всі команди заповнені!');
        //     $this->closeSeries();
        //     return;
        // }

        // // Выбираем первую команду из доступных
        // $team = $teams->first();
        // $teamId = $team->id;
        // $playerNumber = $team->players()->count() + 1;

        // // записываем игрока в команду
        // PlayerTeam::query()->create([
        //     'player_id' => $playerId,
        //     'team_id' => $teamId,
        //     'status' => 'main',
        //     'player_number' => $playerNumber,
        // ]);
    }

    public function deletePlayer()
    {
        PlayerSeriesRegistration::where('player_id', $this->currentPlayer->id)
            ->where('series_meta_id', $this->seriesMeta->id)
            ->delete();
        session()->flash('success', 'Гравця успішно видалено зі складу.');
        // обновляем компонент
        $this->loadPlayers();
    }



    protected function closeSeries()
    {
        // Закрываем регистрацию
        SeriesMeta::query()
            ->where('event_id', $this->event->id)
            ->update(['status_registration' => 'closed']);

        $this->isSeriesClosed = true;
    }  

    protected function openSeries()
    {
         SeriesMeta::query()
            ->where('event_id', $this->event->id)
            ->update(['status_registration' => 'open']);

        $this->isSeriesClosed = false;
    }

    protected function debitFromBalance()
    {
        foreach ($this->players as $player) {
            $userId = $player['user']['id']; 
            \DB::table('users')
                ->where('id', $userId)
                ->update(['balance' => \DB::raw('balance - ' . $this->playerPrice)]);
        }

    }

    public function render()
    {
        return view('livewire.player-request-one');
    }
}
