<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{


    public function index()
    {
        return view('teams.index');
    }  
    
    public function show($id)
    {
        $team = Team::with(['color', 'players'])->find($id);
        $rating = 0;
        $totalRating = 0;
        $totalPlayers = 0;

        foreach($team->players as $player){
            $totalRating += $player->rating;
            $totalPlayers += 1;
        }

        $players = [];
        

        $rating = round($totalRating / $totalPlayers);

        return view('teams.show', compact('team', 'rating'));
    }
    
}
