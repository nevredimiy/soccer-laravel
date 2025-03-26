<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamColor;
use App\Models\PromoCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{

    public $logo;

    public function index()
    {
        return view('teams.index');
    }


    
    
}
