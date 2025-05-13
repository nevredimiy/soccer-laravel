<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 

class ManagerEventPlayers extends Component
{

    public $teamIdsInSeries = null;
    public $playersByNumberByTeamId = null;
    public $teamColors = null;
    public array $templateMatches = []; 
    public array $teamsByMatch = [];
    public ?int $selectedPlayerId = null; 
    

    public function mount($teamIdsInSeries, $playersByNumberByTeamId, $teamColors, $templateMatches)
    {
        $this->teamIdsInSeries = $teamIdsInSeries;
        $this->playersByNumberByTeamId = $playersByNumberByTeamId;
        $this->teamColors = $teamColors;
        $this->templateMatches = $templateMatches;
      
    }


    #[On('selected-match')]
    public function updateSeriesPlayer($matchIteration)
    {
        $templateMatch = $this->templateMatches[$matchIteration-1];

        $this->teamsByMatch = [];
        foreach($templateMatch as $v){
            $this->teamsByMatch[] = $this->teamIdsInSeries[$v];
        }
    }

    public function selectedPlayer($seriesPlayer, $teamId)
    {
        // dump($seriesPlayer);
        $this->selectedPlayerId = $seriesPlayer['id'];
        session(['selected-player' => $seriesPlayer['player_id']]);
        session(['selected-teamId' => $teamId]);
    }

    public function render()
    {
        return view('livewire.manager-event-players');
    }
}
