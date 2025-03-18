<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        $siteSettings = SiteSetting::first();
        return view('home.index', compact('siteSettings'));
    }
}
