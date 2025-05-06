<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerMatchesController extends Controller
{
    public function index(){

        return view('manager/matches/index');
    }

    public function show($id){

        
        
        return view('manager/matches/show', compact('id'));
    }
}
