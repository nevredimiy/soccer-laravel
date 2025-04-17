<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index ()
    {
        $teams = ['yellow', 'orange', 'green', 'gray', 'blue', 'red', 'sky','lime', 'pink'];
        $tours = [];
        $usedCombinations = [];

        foreach ($teams as $i => $team1) {
            for ($j = $i + 1; $j < count($teams); $j++) {
                for ($k = $j + 1; $k < count($teams); $k++) {
                    $combination = [$teams[$i], $teams[$j], $teams[$k]];
                    sort($combination); // чтобы гарантировать уникальность

                    $hash = implode('-', $combination);
                    if (!in_array($hash, $usedCombinations)) {
                        $usedCombinations[] = $hash;
                        $tours[] = $combination;
                    }
                }
            }
        }

        $series1 = array_slice($tours, 0, 10);
        $series2 = array_slice($tours, 10, 10);



        return view('pages.tournaments');
    }


}
