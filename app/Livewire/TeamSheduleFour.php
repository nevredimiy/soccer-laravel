<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;

class TeamSheduleFour extends Component
{
    public $teams = null;
    public array $series1 = [];
    public array $currentRound = [];

    protected array $colorClasses = [
        'Жовтий' => 'yellow-bg',
        'Помаранчевий' => 'orange-bg',
        'Зелений' => 'green-bg',
        'Сірий' => 'gray-bg',
        'Синій' => 'blue-bg',
        'Червоний' => 'red-bg',
        'Рожевий' => 'pink-bg',
        'Голубий' => 'sky-bg',
        'Лаймовий' => 'lime-bg'
    ];


    public function mount()
    {
        $eventId = session('current_event', 0);
        $this->teams = Team::where('event_id', $eventId)->with('color')->get();
        $teamIds = $this->teams->pluck('id')->toArray();

        $this->currentRound = [
            'round_number' => 1,
            'event_id' => $eventId,
            'series_number' => 1
        ];

        // Шаблоны туров
        $this->series1 = [
            [$teamIds[0], $teamIds[1], $teamIds[2]],
            [$teamIds[0], $teamIds[1], $teamIds[3]],
            [$teamIds[0], $teamIds[2], $teamIds[3]],
            [$teamIds[1], $teamIds[2], $teamIds[3]],
            [$teamIds[0], $teamIds[1], $teamIds[2]],
            [$teamIds[0], $teamIds[1], $teamIds[3]],
            [$teamIds[0], $teamIds[2], $teamIds[3]],
            [$teamIds[1], $teamIds[2], $teamIds[3]],
            [$teamIds[0], $teamIds[1], $teamIds[2]],
            [$teamIds[0], $teamIds[1], $teamIds[3]],
            [$teamIds[0], $teamIds[2], $teamIds[3]],
            [$teamIds[1], $teamIds[2], $teamIds[3]],
        ];
        
    }

    public function getBgClass($colorName): string
    {
        return $this->colorClasses[$colorName] ?? 'default-bg';
    }

   

    public function getColorClassByTeamId($teamId)
    {
        $team = $this->teams->firstWhere('id', $teamId);
        return $team ? $this->getBgClass($team->color->name ?? '') : 'default-bg';
    }

    public function selectedRound($roundNumber, $eventId, $seriesNumber)
    {
       
        $this->currentRound = [
            'round_number' => $roundNumber,
            'event_id' => $eventId,
            'series_number' => $seriesNumber
        ];

        $this->dispatch('currentRound', $this->currentRound);
    }


    public function render()
    {
        return view('livewire.team-shedule-four');
    }
}
