<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;
use Livewire\Attributes\On;


class TournamentInfo extends Component
{
    
    public $teams = [];
    public $eventId = null;
    public array $roman = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
    public $colors = [
        '#ff0000', 
        '#00b050',
        '#ffff00',
        '#ff7f27',
        '#0070c0',
        '#808080',
        '#99d9ea',
        '#9bbb59',
        '#ff99ff',
    ];
    
    public function mount()
    {
        $eventId = session('current_event', 0);
        $this->teams = Team::where('event_id', $eventId)->get();
    }

    #[On('eventSelected')]
    public function updateEventId($eventId)
    {
        $this->eventId = $eventId;
        $this->updateTournament();
    }

    protected function updateTournament()
    {
        $this->teams = Team::where('event_id', $this->eventId)->get();
    }


    public function render()
    {
        return view('livewire.tournament-info');
    }
}
