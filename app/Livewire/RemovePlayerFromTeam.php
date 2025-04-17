<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Player;
use App\Models\Team;
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
       
    
        if (!$this->team) {
            session()->flash('error', 'Гравець не належить до жодної команди.');
            return;
        }

        if (Auth::id() !== $this->team->owner_id) {
            session()->flash('error', 'У вас немає права видалити цього гравця.');
            return;
        }

        
        // Удаляем игрока из команды (из pivot-таблицы)
        $this->player->teams()->detach($this->team->id);


        // Закрываем модалку
        $this->confirming = false;

        // Успешное сообщение
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
