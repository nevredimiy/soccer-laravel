<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerSeriesController extends Controller
{
   public function index(){

        return view('manager/series/index');
    }

    public function show($id){

        
        
        return view('manager/series/show', compact('id'));
    }
}
