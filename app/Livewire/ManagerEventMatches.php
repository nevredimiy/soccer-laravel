<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Matche;

class ManagerEventMatches extends Component
{

    public $event = null; 
    public array $teamColors = []; 
    public array $templateMatches = []; 
    public array $teamIdsInSeries = []; 
    public int $activeMatch = 0; 
    public array $matches = []; 

    public function mount($event, $teamColors, $templateMatches, $teamIdsInSeries)
    {

        $this->event = $event;
        $this->teamColors = $teamColors;
        $this->templateMatches = $templateMatches;
        $this->teamIdsInSeries = $teamIdsInSeries;
        $this->matches = Matche::with('matchEvents')->where('event_id', $event->id)->get()->toArray();
        
    }


    public function selectedMatch($matchIteration)
    {
        $match = $this->matches[$matchIteration];
        $this->activeMatch = $matchIteration;
        $this->dispatch('selected-match', matchIteration: $matchIteration);
        session(['selected-match' => $match['id']]);

    }

    public function render()
    {
        return view('livewire.manager-event-matches');
    }
}
