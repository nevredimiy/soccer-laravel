<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\TeamColor;
use App\Models\PromoCode;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\Player;
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
        
               
        $teams = Team::where('event_id', $id)->with('players')->get()->map(function ($team) {
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
             
        return view('teams.events.show', compact('event', 'teams', 'colors', 'player'));
    }
   
}
