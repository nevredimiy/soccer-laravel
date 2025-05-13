<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Matche;
use Livewire\Attributes\On;

class ManagerEventMatches extends Component
{

    public $event = null; 
    public $seriesMeta = null; 
    public array $teamColors = []; 
    public array $templateMatches = []; 
    public array $teamIdsInSeries = []; 
    public int $activeMatch = 0; 
    public array $matches = []; 
    public array $seriesPlayers = [];
    public array $icons = [
        'goal' => 'football', 
        'assist' => 'boots-icon', 
        'autogoal' => 'red-football', 
        'yellow_card' => 'yellow-card-icon', 
        'red_card' => 'red-card-icon'
    ];

    public function mount($event, $teamColors, $templateMatches, $teamIdsInSeries, $seriesMeta)
    {

        $this->event = $event;
        $this->seriesMeta = $seriesMeta;
        $this->teamColors = $teamColors;
        $this->templateMatches = $templateMatches;
        $this->teamIdsInSeries = $teamIdsInSeries;

        foreach($seriesMeta->seriesPlayers->toArray() as $player){
            $this->seriesPlayers[$player['player_id']] = $player;
        }
        
        $this->getDataMatcheEvents();
        
    }


    public function selectedMatch($matchIteration)
    {
        $match = $this->matches[$matchIteration-1];
        $this->activeMatch = $matchIteration;
        $this->dispatch('selected-match', matchIteration: $matchIteration);
        session(['selected-match' => $match['id']]);

    }

    #[On('add-event')]
    public function getDataMatcheEvents()
    {
         $this->matches = Matche::with('matchEvents.team.color')->where('event_id', $this->event->id)->get()->toArray();
    }


    public function render()
    {
        return view('livewire.manager-event-matches');
    }
}
