<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Team;
use Carbon\Carbon;  

class ProfileController extends Controller
{
    public function index()
    {

        $user = auth()->user();

        // Проверяем, есть ли пользователь в таблице players
        $player = Player::where('user_id', $user->id)->first();

        // Если игрока нет, перенаправляем на создание профиля
        if (!$player) {
            return redirect()->route('players.create');
        }

        $teams =  Team::where('id', $player->id)->get();

        $user = auth()->user(); // Получаем объект User

        
    
        if (!$player) {
            return redirect()->route('players.create'); // Перенаправление на форму заполнения
        }

        $dateString = $player->birth_date;  
        $date = Carbon::createFromFormat('Y-m-d', $dateString);  
        $formattedBithDate = $date->locale('uk')->translatedFormat('d F Y');  
    
        return view('profile.index', compact('player', 'formattedBithDate', 'user'));
    }
}
