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

        $oneEvents = Event::where('tournament_id', 1)->withCount('teams')->get();
        $manyEvents = Event::where('tournament_id', 2)->withCount('teams')->get();


        return view('teams.events.index', compact('oneEvents', 'manyEvents'));
    }

    public function show($id)
    {
        

        $event = Event::findOrFail($id);

      
        return view('teams.events.show', compact('event'));
    }
   
}
