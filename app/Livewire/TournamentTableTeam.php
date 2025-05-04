<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;
use Livewire\Attributes\On;

class TournamentTableTeam extends Component
{

    public $teams = [];
    public array $roman = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
    public $eventId = null;


    public function mount($teams = [])
    {
        $this->teams = $teams;
    }

    #[On('eventSelected')]
    public function updateEventId($eventId)
    {
        if($eventId){
            $this->eventId = $eventId;
            $this->teams = $this->getTeams($eventId);
        } else {
            $this->teams = [];
        }
    }

    private function getTeams($eventId)
    {
        $teams = Team::where('event_id', $eventId)->with(['color', 'players'])->get();       

        return $teams;
    }

    public function render()
    {
        return view('livewire.tournament-table-team');
    }
}
