<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\TeamPlayerApplication;
use App\Models\Player;

class JoinTeam extends Component
{

    public $teamId; 
    public $applied = false;

    public function mount($teamId)
    {
        $this->teamId = $teamId;

        // Проверяем, подана ли заявка
        $hasApplication = TeamPlayerApplication::where('team_id', $teamId)
        ->where('user_id', Auth::id())
        ->exists();

        // Проверяем, находится ли игрок в команде
        $isInTeam = \App\Models\Player::where('user_id', Auth::id()) 
            ->where('team_id', $teamId)
            ->exists();

        // Если игрок уже в команде или подал заявку, отключаем кнопку
        $this->applied = $hasApplication || $isInTeam;

    }

    public function apply()
    {
        $user = Auth::user();

        // Проверяем, не подал ли игрок уже заявку в эту команду или не состоит в ней
        $existingApplication = TeamPlayerApplication::where('user_id', $user->id)
            ->where('team_id', $this->teamId)
            ->exists();

        $isInTeam = Player::where('user_id', $user->id)
            ->where('team_id', $this->teamId)
            ->exists();

        if ($existingApplication || $isInTeam) {
            session()->flash('message', 'Вы уже подали заявку в эту команду или уже состоите в ней.');
            return;
        }

        // Записываем заявку
        TeamPlayerApplication::create([
            'user_id' => $user->id,
            'team_id' => $this->teamId,
            'status' => 'pending',
        ]);

        // Делаем кнопку неактивной
        $this->applied = true;

        session()->flash('message', 'Заявка успешно отправлена.');
    }

    public function render()
    {
        return view('livewire.join-team');
    }
}
