<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On; 

class TeamDetails extends Component
{
    public ?Team $team = null;
    public $teams;
    public $players;
    public $teamsWithApplications;
    public array $applications = [];

    public function mount()
    {
        $userId = Auth::id();

        $this->teams = Team::where('owner_id', $userId)->orderByDesc('id')->get();
        $this->team = $this->teams->first();

        if ($this->team) {
            $this->players = $this->getPlayersForTeam($this->team->id);
        }

        $this->teamsWithApplications = $this->teams->load('applications.user.player');
    }

    #[On('team-selected')]
    public function updateTeam($team_id)
    {
        $this->team = Team::find($team_id);
        $this->players = $this->getPlayersForTeam($team_id);
    }

    #[On('applicationsFiltered')]
    public function updateApplications($applications)
    {
        $this->applications = $applications;
    }

    protected function getPlayersForTeam($team_id)
    {
        return Player::where('team_id', $team_id)->get();
    }
    

    public function render()
    {
        return view('livewire.team-details', [
            'team' => $this->team, 
        ]);
    }
}
