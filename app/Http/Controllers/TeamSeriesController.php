<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\SeriesMeta;
use App\Models\Tournament;
use App\Models\Player;
use App\Models\Team;
use App\Models\TeamColor;
use App\Models\Matche;




class TeamSeriesController extends Controller
{
   public function index()
   {
        $tournaments = Tournament::with('events.seriesMeta')->where('type', 'team')->get(); 
        
        return view('teams.series.index', compact('tournaments'));
   }
   public function show($id)
   {
       $userId = auth()->id();
       $player = Player::where('user_id', $userId)->first();   

       $seriesMeta = SeriesMeta::with(['stadium.location.district.city', 'teams.players'])
           ->where('id', $id)
           ->firstOrFail();
       $eventId = SeriesMeta::where('id', $id)->value('event_id');
       $event = Event::find($eventId);
       
       
       $teams = Team::where('event_id', $eventId)->with(['players', 'color'])->get()->map(function ($team) {
           $statusColors = [
               'urgent' => '#b5e61d',
               'needed' => '#22b14c',
               'closed' => '#ed1c24',
           ];
           $statusTexts = [
               'urgent' => 'Терміново потрібні гравці',
               'needed' => 'Потрібні гравці',
               'closed' => 'Заявка закрита',
           ];

           // Средний рейтинг игроков
           $totalRating = 0;
           $totalPlayers = 0;

           // Получаем рейтинг игроков
           $players = $team->players;
           $totalRating = $players->sum('rating');
           $totalPlayers = $players->count();
   
           // Добавляем подготовленные данные в объект команды
           $team->status_color = $statusColors[$team->player_request_status] ?? '#ed1c24';
           $team->status_text = $statusTexts[$team->player_request_status] ?? 'Невідомий статус';
           $team->team_color = $team->color->color_picker ?? '#F7E10E'; // Цвет команды
           $team->rating = $totalPlayers > 0 ? round($totalRating / $totalPlayers) : 0;

           return $team;
        });

        $colors = TeamColor::all();

        $matches = Matche::with(['team1.color', 'team2.color'])->where('event_id', $eventId)->get();
        
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

        

        $playerPrice = [
            6 => round($seriesMeta->price / 6),
            9 => round($seriesMeta->price / 9),
        ];


        $service = new \App\Services\SeriesTemplatesService();
        $teamIds = Team::where('event_id', $eventId)->pluck('id')->toArray();
        \dump($teamIds);
        $matches = $service->getSeries($seriesMeta->series, $teamIds);
        $matches = collect($matches)->map(function ($match) use ($teamIds) {
            return [
                'team1_id' => $teamIds[$match[0]],
                'team2_id' => $teamIds[$match[1]],
                'team3_id' => $teamIds[$match[2]],
            ];
        });
        $matches = $matches->groupBy('series');
       

        

       return view('teams.series.show', compact(
                                            'teams', 
                                            'player', 
                                            'event', 
                                            'series', 
                                            'colors',
                                            'playerPrice',
                                            'seriesMeta',
                                            'matchesByRound',
                                            'matchTeamColors',
                                        )
                                    );
   }
}
