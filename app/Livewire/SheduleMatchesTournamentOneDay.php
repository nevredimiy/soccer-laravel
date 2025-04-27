<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\SeriesTemplatesService;
use App\Models\Event;
use App\Models\Player;

class SheduleMatchesTournamentOneDay extends Component
{
    public ?Event $event = null;
    public array $template = [
        [0,1],
        [0,2],
        [1,2],
        [0,1],
        [0,2],
        [1,2],
        [0,1],
        [0,2],
        [1,2],
        [0,1],
        [0,2],
        [1,2],
        [0,1],
        [0,2],
        [1,2],            
    ];
    public array $teamColorClass = [];
    public array $playerIds = [];
    public $amountForPlayer = 0;
    public $missingAmount = 0;

    public function mount($event, $amountForPlayer = 0)
    {
        $this->event = $event;
        $this->amountForPlayer = $amountForPlayer;

        $teams = $event->teams;
        $service = new SeriesTemplatesService();
        foreach($teams as $key => $team){
            $this->teamColorClass[$key] = $service->getColorClass($team->color->name);
        }

        foreach($event->teams as $team){
            foreach($team->players as $player){
                $this->playerIds[] = $player->id;
            }
        }

    }

    public function BookingPlace()
    {
        
        // Проверяем, есть ли уже игрок в этой команде
        $user = auth()->user();
        $player = Player::query()->where('user_id', '=', $user->id)->first();
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

        
        
        
    }

    public function render()
    {
        return view('livewire.shedule-matches-tournament-one-day');
    }
}
