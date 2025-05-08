<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;
use App\Models\Event;
use App\Models\SeriesMeta;
use App\Services\SeriesTemplatesService;

class TeamShedule extends Component
{
    public ?Event $event = null;
    public array $colorClasses = [];
    public array $colorNames = [];
    public array $templateCalendar = [];
    public $seriesMetas = null;
    public array $currentRound = [];

    public function mount($event)
    {
        $this->event = $event;
        $count_teams = $event->tournament->count_teams;
        $service = new SeriesTemplatesService();
        $this->colorClasses = $service->getColorClasses();
        $this->colorNames = array_keys($this->colorClasses);
        $this->templateCalendar = $service->getTemplateCalendar($count_teams);

        // $this->seriesMetas = SeriesMeta::where('event_id', $event->id)->get()->groupBy('series')->toArray();
        $this->seriesMetas = SeriesMeta::select('series', 'round', 'start_date')
            ->where('event_id', $event->id)
            ->orderBy('series')
            ->orderBy('round')
            ->get()
            ->groupBy('series')
            ->toArray();

        $this->currentRound = [
                'round_number' => 1,
                'event_id' => $event->id,
                'series_number' => 1
            ];
    }

    public function selectedRound($roundNumber, $eventId, $seriesNumber)
    {
        
        $this->currentRound = [
            'round_number' => $roundNumber,
            'event_id' => $this->event->id,
            'series_number' => $seriesNumber
        ];
        $this->dispatch('currentRound', $this->currentRound);
    }

    public function render()
    {
        return view('livewire.team-shedule');
    }
}
