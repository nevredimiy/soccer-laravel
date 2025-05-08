<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\TournamentService;
use Livewire\Attributes\On;
use Illuminate\Support\Collection;

class TournamentTableIndividual extends Component
{

    public Collection $teams;
    public array $players = [];
    public array $roman = [];
    public ?int $eventId = null;

    public function mount(array|Collection $teams = []): void
    {
        $this->teams = $teams;
        $this->players = TournamentService::extractPlayers($this->teams);
        $this->roman = TournamentService::getRomanRounds($this->teams);
    }

    #[On('eventSelected')]
    public function updateEventId($eventId): void
    {
        if ($eventId) {
            $this->eventId = $eventId;
            $this->teams = TournamentService::getTeamsByEvent($eventId);
            $this->players = TournamentService::extractPlayers($this->teams);
            $this->roman = TournamentService::getRomanRounds($this->teams);
        } else {
            $this->teams = collect();
            $this->players = [];
            $this->roman = [];
        }
    }
    
    public function render()
    {

        return view('livewire.tournament-table-individual');
    }
}
