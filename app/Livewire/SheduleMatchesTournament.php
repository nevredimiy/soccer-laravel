<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\SeriesTemplatesService;

class SheduleMatchesTournament extends Component
{
    public $event = null;

    public function mount($event)
    {
        $event->load('seriesMeta');
        $this->event = $event;
       
    }

    public function render()
    {
        $seriesMetas = $this->event->seriesMeta;
        $event = $this->event;

        $service = new SeriesTemplatesService();        
        $temlateSeries = $service->getTemplateCalendar($event->tournament->count_teams);
        $templateMatches = $service->getMatchTemplate();

        $teamColorClass = [];
        if(count($event->teams) == $event->tournament->count_teams){
            for($i=0; $i<$event->tournament->count_rounds; $i++){
                foreach($event->teams as $team){
                    $teamColorClass[$i+1][] = $team->color->color_picker;
                }
            }

        }

        return view('livewire.shedule-matches-tournament', [
            'seriesMetas' => $seriesMetas,
            'templateMatches' => $templateMatches,
            'teamColorClass' => $teamColorClass,
        ]);
    }
}
