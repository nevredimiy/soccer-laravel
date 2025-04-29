<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Matche;
use App\Services\SeriesTemplatesService;

class TournamentProtocol extends Component
{
    public array $currentRound = [];
    public $eventId = '';
    public $teams = null;
    public $matches = null;
    public array $colorClasses = [];

    public  function mount($teams)
    {
        $this->teams = $teams;
        
        $this->eventId = session('current_event', 0);

        $this->currentRound = [
            'round_number' => 1,
            'event_id' => $this->eventId,
            'series_number' => 1
        ];

        $this->getMatches();
        $service = new SeriesTemplatesService();
        $this->colorClasses = $service->getColorClasses();
    }


    #[On('currentRound')]
    public function displayCurrentProtocol($currentRound)
    {
        $this->currentRound = $currentRound;
        
        $this->getMatches();
    }

    public function getMatches()
    {
        $this->matches = Matche::query()
            ->with(['team1.color', 'team2.color', 'matchEvents'])
            ->withCount([
                'matchEvents as team1_goals_count' => function ($query) {
                    $query->where('type', 'goal')
                        ->whereColumn('team_id', 'matches.team1_id');
                },
                'matchEvents as team2_goals_count' => function ($query) {
                    $query->where('type', 'goal')
                        ->whereColumn('team_id', 'matches.team2_id');
                },
            ])
            ->where('event_id', $this->eventId)
            ->where('round', $this->currentRound['round_number'])
            ->where('series', $this->currentRound['series_number'])
            ->where('status', 'finished')
            ->get();
    }

    public function render()
    {
        return view('livewire.tournament-protocol');
    }
}
