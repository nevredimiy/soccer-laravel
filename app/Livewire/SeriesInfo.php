<?php

namespace App\Livewire;

use Livewire\Component;

class SeriesInfo extends Component
{

    public $seriesMeta;
    public $event;
    public $playerPrice;

    public function mount($seriesMeta, $event, $playerPrice = null)
    {
        $this->playerPrice = $playerPrice;
        $this->event = $event;
        $this->seriesMeta = $this->calculateRating($seriesMeta);
    }

    protected function calculateRating($seriesMeta)
    {
        $totalRating = 0;
        $totalPlayers = 0;

        foreach($seriesMeta->playerSeriesRegistration as $playerSR){
            $totalRating += $playerSR->player->rating;
            $totalPlayers += 1;
        }

        $seriesMeta->average_player_rating = $totalPlayers > 0
            ? round($totalRating / $totalPlayers)
            : 0;

        return $seriesMeta;
    }

    


    public function render()
    {
        return view('livewire.series-info');
    }
}
