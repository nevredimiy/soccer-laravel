<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;
use Livewire\Attributes\On; 

class TeamDetails extends Component
{
    public $team;

    public function mount()
    {
        $this->team = Team::where('owner_id', auth()->id())->first();
    }


    #[On('team-selected')]
    public function updateTeam($team_id)
    {
        $this->team = Team::find($team_id);
    }
    

    public function render()
    {
        return view('livewire.team-details', [
            'team' => $this->team, 
        ]);
    }
}
