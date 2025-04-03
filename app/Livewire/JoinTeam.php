<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\TeamPlayerApplication;

class JoinTeam extends Component
{

    public $teamId; 
    public $applied = false;

    public function mount($teamId)
    {
        $this->teamId = $teamId;

        // Проверяем, отправлял ли текущий пользователь заявку
        $this->applied = TeamPlayerApplication::where('team_id', $teamId)
        ->where('user_id', Auth::id()) // ID текущего пользователя
        ->exists();
    }

    public function apply()
    {
        $user = Auth::user();

        $this->applied = true;

        // Проверяем, не подал ли игрок уже заявку в эту команду
        $existingApplication = TeamPlayerApplication::where('user_id', $user->id)
            ->where('team_id', $this->teamId)
            ->where('status', 'pending')
            ->exists();

        if ($existingApplication) {
            session()->flash('message', 'Вы уже подали заявку в эту команду.');
            return;
        }

        // Записываем заявку
        TeamPlayerApplication::create([
            'user_id' => $user->id,
            'team_id' => $this->teamId,
            'status' => 'pending',
        ]);

        session()->flash('message', 'Заявка успешно отправлена.');
    }

    public function render()
    {
        return view('livewire.join-team');
    }
}
