<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\Event;

class PlayerRequestController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::with('events')->get(); 

        return view('player-request.index', compact('tournaments'));
    }

    public function create(Request $request)
    {
        $date = $request->date;
        $location = $request->location;
        return view('player-request.create', compact('date', 'location'));
    }
}
