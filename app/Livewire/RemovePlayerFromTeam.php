<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;

class RemovePlayerFromTeam extends Component
{
    public $player;
    public $team;
    public $confirming = false;

    public function mount($player, $team)
    {
        $this->player = $player;
        $this->team = $team;
    }

    public function confirm()
    {
        $this->confirming = true;
    }

    public function cancel()
    {
        $this->confirming = false;
    }

    public function remove()
    {
        if (Auth::id() !== $this->player->team->owner_id) {
            session()->flash('error', 'У вас немає права видалити цього гравця.');
            return;
        }

        $this->player->team_id = null;
        $this->player->status = 'reserve';
        $this->player->save();

        $this->confirming = false;
        session()->flash('success', "Гравця {$this->player->last_name} успішно видалено з команди {$this->team->name}.");

        // // Если нужно скрыть карточку игрока
        // $this->dispatch('playerRemoved', playerId: $this->player->id);
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.remove-player-from-team');
    }
}
