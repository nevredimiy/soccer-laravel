<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;

class TeamMaxPlayers extends Component
{

    public ?Team $team = null;
    public $max_players;

    public function mount($team)
    {
        $this->team = Team::findOrFail($team->id);
        $this->max_players = $this->team->max_players;
    }

    public function saveMaxPlayers()
    {
        if ($this->team) {
            $this->team->update(['max_players' => $this->max_players]);
        }
    }

    public function render()
    {
        return view('livewire.team-max-players');
    }
    
}
