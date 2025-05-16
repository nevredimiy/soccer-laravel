<?php

namespace App\Livewire;

use Livewire\Component;

class ManagerVoteBestPlayers extends Component
{

    public $series = null;
    public $playersTeam = null;

    public function mount($series, $playersTeam)
    {
        $this->series = $series;
        $this->playersTeam = $playersTeam;
        
    }


    public function render()
    {
        return view('livewire.manager-vote-best-players');
    }
}
