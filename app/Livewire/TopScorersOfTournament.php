<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;
use Livewire\Attributes\On;
use App\Models\MatcheEvent;
use App\Services\SeriesTemplatesService;
use App\Models\Matche;
use Illuminate\Support\Facades\DB;
use App\Models\Player;

class TopScorersOfTournament extends Component
{

    public $eventId = null;
    public $teams = [];
    public $topScorers = [];
    public $topAssists = [];
    public $topScorersLimit = 10;
    public $topScorersOffset = 0;
    

    public function mount($teams, $eventId)
    {
        if($eventId) {
            $this->eventId = $eventId;
        } else {
            $this->eventId = session('current_event', 0);
        }
        
        $this->teams = $teams;
        $this->topScorers = $this->getTopScorers();
        $this->topAssists = $this->getTopAssists();
        
    }
    public function getTopScorers()
    {

        $matchesIds = Matche::where('event_id', $this->eventId)->pluck('id');

        return MatcheEvent::query()
            ->select(
                'player_id',
                'team_id',
                DB::raw('COUNT(*) as goals_count'),
                DB::raw('COUNT(DISTINCT match_id) as matches_count')
            )
            ->with(['player', 'team.color'])
            ->whereIn('match_id', $matchesIds)
            ->where('type', 'goal')
            ->groupBy('player_id', 'team_id')
            ->orderByDesc('goals_count')
            ->limit($this->topScorersLimit)
            ->offset($this->topScorersOffset)
            ->get();

    }

    public function getTopAssists()
    {
        $matchesIds = Matche::where('event_id', $this->eventId)->pluck('id');
    
        return MatcheEvent::query()
            ->select(
                'assister_id',
                'team_id',
                DB::raw('COUNT(*) as assists_count'),
                DB::raw('COUNT(DISTINCT match_id) as matches_count')
            )
            ->with(['assister', 'team.color'])
            ->whereIn('match_id', $matchesIds)
            ->where('type', 'goal')
            ->whereNotNull('assister_id')
            ->groupBy('assister_id', 'team_id')
            ->orderByDesc('assists_count')
            ->limit($this->topScorersLimit)
            ->offset($this->topScorersOffset)
            ->get();
    }


    

    public function render()
    {
        return view('livewire.top-scorers-of-tournament');
    }
}
