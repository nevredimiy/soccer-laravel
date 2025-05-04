<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\Player;
use App\Models\PlayerTeam;

class PlayerRequestOnePrivate extends Component
{

    public ?Event $event = null;
    public $regPlayers = [];
    public array $playerIds = [];
    public $playerPrice = 0;
    public $missingAmount = 0;

    public function mount($event, $playerPrice = 0)
    {

        $this->event = $event;
        $this->playerPrice = $playerPrice;

        $this->loadPlayers();

    }

    public function BookingPlace($teamId, $playerNumber)
    {
        // Проверяем, есть ли уже игрок в этой команде
        $user = auth()->user();
        $player = Player::query()->where('user_id', '=', $user->id)->first();

        if(in_array($player->id, $this->playerIds)){
            session()->flash('error', 'Ви вже в серії!');
            return;
        }

        $balance = $user->balance;
        $this->missingAmount = $this->playerPrice - $balance;
        if($balance < $this->playerPrice){
            session()->flash('error_balance', "Недостатньо коштів на балансі! Мінімальна сумма $this->playerPrice грн.");
            return;
        }

        // записываем игрока в команду
        PlayerTeam::query()->create([
            'player_id' => $player->id,
            'team_id' => $teamId,
            'status' => 'main',
            'player_number' => $playerNumber,
        ]);

        $this->loadPlayers();
    }

    public function loadPlayers()
    {
        $this->regPlayers = [];
        $this->playerIds = [];

        foreach ($this->event->teams as $team) {
            $playerTeams = PlayerTeam::query()
                ->where('team_id', '=', $team->id)
                ->get();

            foreach ($team->players as $player) {
                $this->playerIds[] = $player->id;
                
                $this->regPlayers[$team->id][] = [
                    'id' => $player->id,
                    'first_name' => $player->first_name,
                    'last_name' => $player->last_name,
                    'photo' => $player->photo,
                    'rating' => $player->rating,
                    'player_number' => $playerTeams->where('player_id', $player->id)->first()->player_number ?? null,
                ];
            }
        }
    }

   
    public function render()
    {
        return view('livewire.player-request-one-private');
    }
}
