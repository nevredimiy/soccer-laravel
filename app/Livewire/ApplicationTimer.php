<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Team;
use App\Models\TeamPlayerApplication;
use Livewire\Attributes\On; 

class ApplicationTimer extends Component
{
    public $applicationId;
    public $expiresAt;
    public $team;
    public $application;

    public function mount($applicationId)
    {
        $application = TeamPlayerApplication::findOrFail($applicationId);
        $team = Team::findOrFail($application->team_id);
        $this->team = $team;
        $this->application = $application;

        $this->expiresAt = Carbon::parse($application->created_at)
            ->addDays($team->application_lifetime_days)
            ->addHours($team->application_lifetime_hours)
            ->addMinutes($team->application_lifetime_minutes);
    }

    #[On('applicationLifetimeUpdated')] 
    public function refreshSettings()
    {
        
        $team = Team::findOrFail($this->application->team_id);
     
        $this->expiresAt = Carbon::parse($this->application->created_at)
            ->addDays($team->application_lifetime_days)
            ->addHours($team->application_lifetime_hours)
            ->addMinutes($team->application_lifetime_minutes);
        // $application = TeamPlayerApplication::findOrFail($applicationId);
        // $team = Team::findOrFail($application->team_id);
        // $this->team = $team;
        // $this->application = $application;

        // $this->expiresAt = Carbon::parse($application->created_at)
        //     ->addDays($team->application_lifetime_days)
        //     ->addHours($team->application_lifetime_hours)
        //     ->addMinutes($team->application_lifetime_minutes);


        // // $team = Team::findOrFail($application->team_id);
        // // Загружаем команды пользователя вместе с заявками игроков
        // $teamApp = Team::where('id', $teamId)
        //     ->with('applications') // Загружаем заявки + информацию о игроках
        //     ->get();



        // if ($this->team->id == $teamId) {
        //     $application = $teamApp->first()->applications->first(); 
        //     $this->expiresAt = Carbon::parse($application->created_at)
        //     ->addDays($this->team->application_lifetime_days)
        //     ->addHours($this->team->application_lifetime_hours)
        //     ->addMinutes($this->team->application_lifetime_minutes);
        // }
        // return redirect()->to('/profile');

    }

    // public function updated()
    // {
    //     $this->expiresAt = $this->expiresAt;
    // }

    
    public function render()
    {
        return view('livewire.application-timer');
    }
}
