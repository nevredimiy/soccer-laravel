<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Collection;
use App\Services\TournamentService;

class TournamentTableTeam extends Component
{

    public Collection $teams;
    public ?int $eventId = null;
    public array $roman = [];


    public function mount(Collection|array $teams = []): void
    {
        $this->teams = $teams;
        $this->roman = TournamentService::getRomanRounds($this->teams);
    }
   
    #[On('eventSelected')]
    public function updateEventId($eventId): void
    {
        $this->eventId = $eventId;

        if ($eventId) {
            $this->teams = TournamentService::getTeamsByEvent($eventId);
            $this->roman = TournamentService::getRomanRounds($this->teams);
        } else {
            $this->teams = collect();
            $this->roman = [];
        }
    }

    public function render(): \Illuminate\View\View
    {       
        return view('livewire.tournament-table-team');
    }
}
