<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;
use App\Models\Event;

class TeamList extends Component
{

    public $teams;
    public $activeTeamId;
    
    public function mount()
    {
        $this->teams = Team::with('event.stadium')
            ->where('owner_id', auth()->id())
            ->get();
        $this->activeTeamId = $this->teams->first()?->id;// Первая команда активна по умолчанию
        
        // $this->dispatch('team-selected', teamId: $this->activeTeamId);
        $this->dispatch('team-selected', team_id: $this->activeTeamId);

    }

    public function selectTeam($teamId)
    {
        $this->activeTeamId = $teamId;
        $this->dispatch('team-selected', team_id: $teamId);
    }

    public function render()
    {
        return view('livewire.team-list');
    }
}
