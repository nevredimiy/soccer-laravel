<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stadium;

class StadiumController extends Controller
{
    public function index() 
    {
        $stadia = Stadium::all();
        return view('pages.stadia', compact('stadia'));
    }
}
