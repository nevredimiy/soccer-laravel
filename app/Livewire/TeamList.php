<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;
use App\Models\Event;
use App\Models\Player;

class TeamList extends Component
{

    public $teams;
    public $activeTeamId;
    public $userId;
    
    public function mount()
    {
        $this->userId = auth()->id();
    
        // Получаем ID всех команд, где участвует игрок
        $playerTeamIds = \DB::table('player_teams')
            ->where('player_id', function ($query) {
                $query->select('id')
                    ->from('players')
                    ->where('user_id', $this->userId)
                    ->limit(1);
            })
            ->pluck('team_id');
    
        $this->teams = Team::with('event.stadium')
            ->where('owner_id', $this->userId)
            ->orWhereIn('id', $playerTeamIds)
            ->orderByDesc('id')
            ->get();
    
        $this->activeTeamId = $this->teams->first()?->id;
    
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
