<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamColor;
use App\Models\PromoCode;
use Illuminate\Http\Request;

class TeamController extends Controller
{


    public function create()
    {
        // Получаем доступные цвета для команд
        $colors = TeamColor::all();

        // Получаем активные промокоды
        $promoCodes = PromoCode::all();

        return view('teams.create', compact('colors', 'promoCodes'));
    }

    public function store(Request $request)
    {

        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'color' => 'nullable',
            'promo_code' => 'nullable|exists:promo_codes,code',
        ]);

        $color = TeamColor::where('name', $request->color)->first();
     
        // Проверка на уникальность цвета
        $existingColor = Team::where('color_id', $color->id)->first();
        if ($existingColor) {
            return back()->withErrors(['color' => 'Цей колір вже зайнятий.']);
        }

        // Создание команды
        $team = Team::create([
            'name' => $request->name,
            'color' => $request->color,
            'promo_code_id' => PromoCode::where('code', $request->promo_code)->first()->id ?? null,
        ]);

        // Логика для обработки логотипа
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $team->update(['logo' => $logoPath]);
        }

        return redirect()->route('teams.index')->with('success', 'Команда успішно створена.');
    }
}
