<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Team;
use App\Models\TeamPlayerApplication;
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
        $date = Carbon::createFromFormat('Y-m-d', substr($dateString, 0, 10));  
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

    
    public function updatePlayerList(Request $request)
    {
        $playerId = $request->input('player_id');
        $teamId = $request->input('team_id');
        $userId = $request->input('user_id');
        $action = $request->input('action'); // Получаем, какая кнопка была нажата


        if ($action === 'accept') {
            
             // Получаем игрока
            $player = Player::find($playerId);
            if (!$player) {
                return back()->with('error', 'Гравець не знайдений.');
            }

           // Обновляем team_id у игрока
            $player->update([
                'team_id' => $teamId,
                'status' => 'reserve',
            ]);

            // Получаем команду
            $team = Team::find($teamId);
            if (!$team) {
                return back()->with('error', 'Команда не знайдена.');
            }

            // Удаляем заявку
            TeamPlayerApplication::where('user_id', $userId)->delete();

            return back()->with('success', "Гравець {$player->last_name} підписаний у команду {$team->name}!");
        }

       

        if ($action === 'reject') {
            // Удаляем заявку без добавления в команду
            TeamPlayerApplication::where('user_id', $userId)->where('team_id', $teamId)->delete();

            $player = Player::find($playerId);
            if (!$player) {
                return back()->with('error', 'Гравець не знайдений.');
            }

            return back()->with('notice', "Заявку гравця {$player->last_name}  відхилено.");
        }

        return back()->with('warning', 'Невідома дія.');
    }

    public function togglePlayerStatus(Request $request)
    {
        $team = Team::findOrFail($request->input('team_id'));
        $maxPlayers  = $team->max_players;
        
        
        $players = Player::where('team_id', $request->input('team_id'))->where('status', 'main')->get();

        if($players->count() < $maxPlayers){
            $player = Player::findOrFail($request->input('player_id'));
            $newStatus = $request->input('action') === 'main' ? 'main' : 'reserve';
    
            $player->status = $newStatus;
            $player->save();
    
            return back()->with('success', "Статус гравця {$player->last_name} оновлено.");
        } else {
            return back()->with('error', "Статус не оновлено! Кількість основних гравців не повинна перевищувати {$maxPlayers}");
        }

    }
}
