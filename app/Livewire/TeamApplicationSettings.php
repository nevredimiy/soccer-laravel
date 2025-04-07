<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;
use Carbon\Carbon;  
use Illuminate\Support\Facades\Auth;

class TeamApplicationSettings extends Component
{

    public $team;
    public $days;
    public $hours;
    public $minutes;


    public function mount(Team $team)
    {
        // Проверяем, что текущий пользователь владелец
        if (Auth::id() !== $team->owner_id) {
            abort(403);
        }

        $this->team = $team;
        $this->days = $team->application_lifetime_days;
        $this->hours = $team->application_lifetime_hours;
        $this->minutes = $team->application_lifetime_minutes;

    }

    public function save()
    {
        $this->validate([
            'days' => 'required|integer|min:0',
            'hours' => 'required|integer|min:0|max:23',
            'minutes' => 'required|integer|min:0|max:59',
        ]);

        $this->team->update([
            'application_lifetime_days' => $this->days,
            'application_lifetime_hours' => $this->hours,
            'application_lifetime_minutes' => $this->minutes,
        ]);

        

        //  // Вычисляем новое время  
        // $newTime = Carbon::parse($this->team->created_at)  
        //     ->addDays((int)$this->days)  
        //     ->addHours((int)$this->hours)  
        //     ->addMinutes((int)$this->minutes);  

            

        // $this->dispatch('applicationLifetimeUpdated', teamId: $this->team->id);
        $this->dispatch('applicationLifetimeUpdated');
        // $this->dispatch('applicationLifetimeUpdated', ['teamId' => $this->team->id, 'newTime' => $newTime->toIso8601String()]);


        session()->flash('success', 'Налаштування часу заявки оновлено.');
    }

    
    public function render()
    {
        return view('livewire.team-application-settings');
    }
}
