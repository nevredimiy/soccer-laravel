<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\Event;

class PlayerRequestController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::with('events.teams.players')->get(); 

        $countPlayersOfEvent = [];
        $sumRating = [];
        $averageRating = [];

        foreach ($tournaments as $tournament) {
            foreach ($tournament->events as $event) {
                foreach ($event->teams as $team) {

                    // Подсчёт количества игроков
                    if (isset($countPlayersOfEvent[$event->id])) {
                        $countPlayersOfEvent[$event->id] += $team->players->count();
                    } else {
                        $countPlayersOfEvent[$event->id] = $team->players->count();
                    }

                    // Подсчёт суммы рейтингов
                    foreach ($team->players as $player) {
                        if (isset($sumRating[$event->id])) {
                            $sumRating[$event->id] += $player->rating;
                        } else {
                            $sumRating[$event->id] = $player->rating;
                        }
                    }
                }

                // Вычисление среднего рейтинга (если есть игроки)
                if (!empty($countPlayersOfEvent[$event->id])) {
                    $averageRating[$event->id] = round($sumRating[$event->id] / $countPlayersOfEvent[$event->id]);
                } else {
                    $averageRating[$event->id] = 0;
                }
            }
        }

        return view('players.events.index', compact('tournaments', 'countPlayersOfEvent', 'averageRating'));
    }

    public function show($id)
    {
        $event = Event::with('tournament')->findOrFail($id);

        if (
            $event->tournament->type === 'solo_private' &&
            !session()->has("access_granted_event_{$id}")
        ) {
            return view('players.events.access-form', compact('event'));
        }


        return view('players.events.show', compact('event'));
    }

    public function checkAccessCode(Request $request, $id)
    {
        $event = Event::with('tournament')->findOrFail($id);

        $request->validate([
            'access_code1' => 'required|numeric|digits:1',
            'access_code2' => 'required|numeric|digits:1',
            'access_code3' => 'required|numeric|digits:1',
            'access_code4' => 'required|numeric|digits:1',
        ]);

        $enteredCode = $request->access_code1
                    . $request->access_code2
                    . $request->access_code3
                    . $request->access_code4;

        // Тут должна быть проверка с сохранённым кодом доступа.
        // Для примера: допустим код хранится в $event->access_code
        if ($enteredCode === $event->access_code) {
            session()->put("access_granted_event_{$event->id}", true);
            return redirect()->route('players.events.show', $event->id);
        }

        return redirect()
            ->back()
            ->withErrors(['access_code' => 'Невірний код доступу'])
            ->withInput();
    }
}
