<?php

namespace App\Livewire;

use Livewire\Component;

class PlayerRequestOne extends Component
{

    public $event = null;
    public $players = null;

    public function mount($event)
    {
        $this->event = $event;

    }

    public function render()
    {
        return view('livewire.player-request-one');
    }
}
