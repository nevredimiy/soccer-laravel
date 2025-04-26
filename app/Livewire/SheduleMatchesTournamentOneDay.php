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

    public function mount($event)
    {
        $this->event = $event;

        $teams = $event->teams;
        $service = new SeriesTemplatesService();
        foreach($teams as $key => $team){
            $this->teamColorClass[$key] = $service->getColorClass($team->color->name);
        }

        foreach($event->teams as $team){
            foreach($teams->players as $player){
                $this->playerIds[] = $player->id;
            }
        }
    }

    public function BookingPlace()
    {
        $user = auth()->user();
        $player = Player::query()->whe
        dump($user);
    }

    public function render()
    {
        return view('livewire.shedule-matches-tournament-one-day');
    }
}
