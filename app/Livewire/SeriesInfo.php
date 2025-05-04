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
        $this->seriesMeta = $seriesMeta;
        $this->event = $event;

    }
    public function render()
    {
        return view('livewire.series-info');
    }
}
