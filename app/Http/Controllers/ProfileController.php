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
            return redirect()->route('players.create')->with('success', 'Ваш email було успішно підтверджено!');;
        }

        // // Формируем массив статусов команд
        // $teams = $user->teams->map(function ($team) {
        //     return [
        //         'data' => $team,
        //         'status_message' => $team->status === 'awaiting_payment' ? 'Очікування на оплату' :
        //                             ($team->status === 'paid' ? 'Сплачено' : null),
        //         'status' => $team->status === 'awaiting_payment' ? 0 : ($team->status === 'paid' ? 1 : null)
        //     ];
        // });
        

        $dateString = $player->birth_date;  
        $date = Carbon::createFromFormat('Y-m-d', $dateString);  
        $formattedBithDate = $date->locale('uk')->translatedFormat('d F Y');  
    
        return view('profile.index', compact('player', 'formattedBithDate', 'user'));
    }

    public function updateRating(Request $request)
    {

        if($request->rating){
            $user = auth()->user();
            Player::where('user_id', $user->id)->update(['rating' => $request->rating]);
            return redirect()->route('profile')->with('success', 'Рейтинг змінено!');
        }
        return redirect()->route('profile')->with('notice', 'Рейтинг той самий!');
    }
}
