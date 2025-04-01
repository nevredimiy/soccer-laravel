<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\TeamColor;
use App\Models\PromoCode;
use App\Models\Team;


class TeamEventController extends Controller
{
    public function index()
    {
        
        // $oneEvents = Event::where('tournament_id', 1)->withCount('teams')->get();
        // $manyEvents = Event::where('tournament_id', 2)->withCount('teams')->get();


        return view('teams.events.index');
    }

    public function show($id)
    {
        
        $teams = Team::where('event_id', $id)->get()->map(function ($team) {
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
    
            // Добавляем подготовленные данные в объект команды
            $team->status_color = $statusColors[$team->player_request_status] ?? '#ed1c24';
            $team->status_text = $statusTexts[$team->player_request_status] ?? 'Невідомий статус';
            $team->team_color = $team->color->color_picker ?? '#F7E10E'; // Цвет команды
    
            return $team;
        });
        
        
        $event = Event::with('location.stadium')->findOrFail($id);
        $colors = TeamColor::all();
      
        // dd($event);
        return view('teams.events.show', compact('event', 'teams', 'colors'));
    }
   
}
