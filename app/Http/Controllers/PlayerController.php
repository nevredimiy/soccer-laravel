<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function create()
    {
        return view('players.create'); // Форма для ввода данных
    }

    public function store(Request $request)
    {

        $request->merge([
            'day' => intval($request->day),
            'month' => intval($request->month),
            'year' => intval($request->year),
        ]);
        

        $request->validate([
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'day' => 'required|integer|min:1|max:31',
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'photo' => 'nullable|image|max:2048',
            'phone' => ['required', 'regex:/^\+380\d{9}$/'],
        ]);

        // Собираем дату
        $birthDate = sprintf('%04d-%02d-%02d', $request->year, $request->month, $request->day);
        $cleanedPhone = preg_replace('/\D/', '', $request->phone); // Убираем всё, кроме цифр
        $cleanedPhone = '+' . $cleanedPhone; // Добавляем +

        // Проверяем, является ли дата корректной
        if (!checkdate($request->month, $request->day, $request->year)) {
            return back()->withErrors(['birth_date' => 'Некорректная дата рождения'])->withInput();
        }


        $user = auth()->user();

        $player = new \App\Models\Player();
        $player->user_id = $user->id;
        $player->last_name = $request->lastname;
        $player->first_name = $request->firstname;
        $player->phone = $cleanedPhone;
        $player->birth_date = $birthDate;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('img/avatars', 'public');
            $player->photo = $path;
        }

        $player->rating = $request->rating;

        $player->save();

        return redirect()->route('profile')->with('success', 'Данные успешно сохранены!');
    }

    
}
