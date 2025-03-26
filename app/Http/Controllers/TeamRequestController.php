<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamColor;
use App\Models\PromoCode;
use App\Models\Team;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class TeamRequestController extends Controller
{
    public function index()
    {

        $oneEvents = Event::where('tournament_id', 1)->withCount('teams')->get();
        $manyEvents = Event::where('tournament_id', 2)->withCount('teams')->get();


        return view('team-request.index', compact('oneEvents', 'manyEvents'));
    }

    public function create(Request $request)
    {

        $colors = TeamColor::all();

        $promoCodes = PromoCode::all();

        $teams = Team::all();

        
        $date = $request->date;
        $location = $request->location;

        return view('team-request.create', compact('colors', 'promoCodes', 'teams'));
    }

    public function store(Request $request)
    {

        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'color_id' => 'nullable',
            'promo_code' => 'nullable|exists:promo_codes,code',
        ]);

        $color = TeamColor::where('id', $request->color_id)->first();
     
        // Проверка на уникальность цвета
        $existingColor = Team::where('color_id', $color->id)->first();
        if ($existingColor) {
            return back()->withErrors(['color' => 'Цей колір вже зайнятий.']);
        }

        // Создание команды
        $team = Team::create([
            'owner_id' => Auth::id(),
            'name' => $request->name,
            'color_id' => $request->color_id,
            'promo_code_id' => PromoCode::where('code', $request->promo_code)->first()->id ?? null,
        ]);

        // Логика для обработки логотипа
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('img/team_logo', 'public');
            $team->update(['logo' => $logoPath]);
        }

        return redirect()->route('profile')->with('success', 'Команда успішно створена.');
    }

}
