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
    public $amountForPlayer = 0;
    public $missingAmount = 0;

    public function mount($event, $amountForPlayer = 0)
    {

        $this->event = $event;
        $this->amountForPlayer = $amountForPlayer;

        foreach ($event->teams as $team) {
            
            // Получем всех игроков команды
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

        dump($this->regPlayers);
    }

    public function BookingPlace($teamId, $playerNumber)
    {
        // Проверяем, есть ли уже игрок в этой команде
        $user = auth()->user();
        $player = Player::query()->where('user_id', '=', $user->id)->first();
        dump($playerNumber, $teamId, $player->id);
        if(in_array($player->id, $this->playerIds)){
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
        PlayerTeam::query()->create([
            'player_id' => $player->id,
            'team_id' => $teamId,
            'status' => 'main',
            'player_number' => $playerNumber,
        ]);
        
    }
   
    public function render()
    {
        return view('livewire.player-request-one-private');
    }
}
