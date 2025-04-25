<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class TournamentProtocol extends Component
{
    public array $currentRound = [];
    public $eventId = '';

    public  function mount($teams)
    {
        
        $this->eventId = session('current_event', 0);

        $this->currentRound = [
            'round_number' => 1,
            'event_id' => $this->eventId,
            'series_number' => 1
        ];

    }


    #[On('currentRound')]
    public function displayCurrentProtocol($currentRound)
    {

        $this->currentRound = $currentRound;
    }

    public function render()
    {
        return view('livewire.tournament-protocol');
    }
}
