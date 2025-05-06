<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Collection;
use App\Models\Matche;
use App\Models\SeriesMeta;
use App\Models\TeamColor;
use App\Services\SeriesTemplatesService;

class Shedule extends Component
{

    
    public $seriesGroupedByRound = [];
    public $templateSeries = [];
    public $templateMatches = [];
    public $colorClasses = [];
    public $event;
    public $teams;

    public function __construct($teams, $event)
    {

        $this->teams = $teams;
        $this->event = $event;
        
        $service = new SeriesTemplatesService();
        $this->templateSeries = $service->getSeriesPure($event->tournament->count_teams);
        $this->templateMatches = $service->getMatchTemplate();
        $this->colorClasses = $service->getColorClasses();

        // Получаем все серии данного турнира и группируем их по турам
        $seriesMetas = SeriesMeta::query()->where('event_id', $event->id)->get();
        $this->seriesGroupedByRound = $seriesMetas->groupBy('round');

        // Получаем все матчи турнира
        $matches = Matche::with(['team1.color', 'team2.color'])->where('event_id', $event->id)->get();


        $colorClasses = [];
        foreach ($this->seriesGroupedByRound as $round => $item){
            foreach($item as $numberSeries => $seriesMeta){
                // $colorClasses[$round][$numberSeries+1][]
                
            }
        }
       
       

    }

    public function team()
    {

        $matches = Matche::with(['team1.color', 'team2.color'])->where('event_id', $eventId)->get();

        $colors = TeamColor::all();        
        
        $matchesByRound = $matches->groupBy('round');
        $matchesBySeries = $matches->groupBy('series');

        $series = [];        
        $roundMatchesBySeries = [];
        $matchTeamColors = [];

        $service = new \App\Services\SeriesTemplatesService();

        $colorClasses = $service->getColorClasses();

        foreach($matchesByRound as $round => $roundMatches){
            $firstMatch = $roundMatches->first();
            $startRound = \Carbon\Carbon::parse($firstMatch->start_time)->locale('uk');
            $startRound->settings(['formatFunction' => 'translatedFormat']);
            $dayMonth = $startRound->format('d M');
            $weekday = $startRound->format('l');
            $roundMatches->dayMonth = $dayMonth;
            $roundMatches->weekday = $weekday;
            
            foreach($roundMatches as $roundMatche){
                $roundMatche->team1ColorClass = $colorClasses[$roundMatche->team1->color->name] ?? 'default-bg';
                $roundMatche->team2ColorClass = $colorClasses[$roundMatche->team2->color->name] ?? 'default-bg';
            }      
            
            for ($i=1; $i <= count($matchesBySeries); $i++){
                $series[$i] = $roundMatches->firstWhere('series', $i);  
            }

            $roundMatchesBySeries[] = $roundMatches->groupBy('series');

            foreach ($roundMatchesBySeries as $key => $tur){
                foreach ($tur as $ser){
                    foreach ($ser as $k => $mat){
                        $matchTeamColors[$key+1][$k+1]['s' . $mat->series . 't1'] = $mat->team1ColorClass;
                        $matchTeamColors[$key+1][$k+1]['s' . $mat->series . 't2'] = $mat->team2ColorClass;
                        
                    }
                }
            }
        }

        $service = new \App\Services\SeriesTemplatesService();
        $teamIds = Team::where('event_id', $eventId)->pluck('id')->toArray();

        $matches = $service->getSeries($seriesMeta->series, $teamIds);
        $matches = collect($matches)->map(function ($match) use ($teamIds) {
            return [
                'team1_id' => $teamIds[$match[0]],
                'team2_id' => $teamIds[$match[1]],
                'team3_id' => $teamIds[$match[2]],
            ];
        });
        $matches = $matches->groupBy('series');
       
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shedule', [
            'seriesGroupedByRound' => $this->seriesGroupedByRound,
            'templateSeries' => $this->templateSeries,
            'templateMatches' => $this->templateMatches,
            'colorClasses' => $this->colorClasses,
            'event' => $this->event,
            'teams' => $this->teams,
        ]);
    }
}
