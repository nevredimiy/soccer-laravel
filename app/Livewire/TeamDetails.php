<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;
use App\Models\Player;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\Auth;

class TeamDetails extends Component
{
    public $team;
    public $players;
    public $teamsWithApplications;
    public $applications = [];

    public function mount()
    {
        $this->team = Team::where('owner_id', auth()->id())->first();

        // Загружаем команды пользователя вместе с заявками игроков
        $this->teamsWithApplications = Team::where('owner_id', Auth::id())
            ->with('applications.user.player') // Загружаем заявки + информацию о игроках
            ->get();
        $this->players = Player::where('team_id', $this->team->id)->get();
    }


    #[On('team-selected')]
    public function updateTeam($team_id)
    {
        $this->team = Team::find($team_id);
    }

    
    #[On('applicationsFiltered')]
    public function updateApplications($applications)
    {
        // Обновляем заявки в родительском компоненте
        $this->applications = $applications;
    }
    

    public function render()
    {
        return view('livewire.team-details', [
            'team' => $this->team, 
        ]);
    }
}
