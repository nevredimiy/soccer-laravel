<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\TeamColor;
use App\Models\PromoCode;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\Player;
use App\Models\Matche;
use App\Models\SeriesMeta;
use Illuminate\Support\Facades\Auth;


class TeamEventController extends Controller
{


    public function index()
    {
        
        $tournaments = Tournament::with('events.stadium.location.district.city')->whereIn('id', [1, 2])->get(); 

        return view('teams.events.index', compact('tournaments'));
    }

    public function show($id)
    {


        $user = Auth::id();
        $player = Player::where('user_id', Auth::id())->first();        
               
        $teams = Team::where('event_id', $id)->with(['players', 'color'])->get()->map(function ($team) {
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

 
        $event = Event::with('stadium')->findOrFail($id);
        $colors = TeamColor::all();
        $eventTeams = Team::where('event_id', $id)->get();

        // Количество команд
        $event->teams_count = $eventTeams->count();

        // Средний рейтинг игроков
        $totalRating = 0;
        $totalPlayers = 0;

        foreach ($eventTeams as $team) {
            $players = $team->players;
            $totalRating += $players->sum('rating');
            $totalPlayers += $players->count();
        }

        $event->average_player_rating = $totalPlayers > 0
            ? round($totalRating / $totalPlayers)
            : 0;
        
        $matches = Matche::with(['team1.color', 'team2.color'])->where('event_id', $id)->get();
        $matchesByRound = $matches->groupBy('round');
        $matchesBySeries = $matches->groupBy('series');

        $series = [];

        $colorClasses = [
            'Жовтий' => 'yellow-bg',
            'Помаранчевий' => 'orange-bg',
            'Зелений' => 'green-bg',
            'Сірий' => 'gray-bg',
            'Синій' => 'blue-bg',
            'Червоний' => 'red-bg',
            'Рожевий' => 'pink-bg',
            'Голубий' => 'sky-bg',
            'Лаймовий' => 'lime-bg'
        ];

        $roundMatchesBySeries = [];
        $matchTeamColors = [];
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

        $seriesPrices = SeriesMeta::query()->where('event_id', '=', $id)->first();

        $playerPrice = [
            6 => round($seriesPrices->price / 6),
            9 => round($seriesPrices->price / 9),
        ];

        

           
        return view('teams.events.show', compact(
                                            'event', 
                                            'teams', 
                                            'colors', 
                                            'player', 
                                            'matches', 
                                            'matchesByRound',
                                            'matchesBySeries',
                                            'series',
                                            'matchTeamColors',
                                            'playerPrice'
                                        )
                    );
    }
   
}
