<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerRequestController extends Controller
{
    public function index()
    {
        return view('player-request.index');
    }

    public function create(Request $request)
    {
        $date = $request->date;
        $location = $request->location;
        return view('player-request.create', compact('date', 'location'));
    }
}
