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
        return view('teams.show', compact('team'));
    }
    
}
