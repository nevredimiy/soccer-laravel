<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;

class TeamSheduleFour extends Component
{
    protected array $tourTemplate = [
        ['Червоний', 'Зелений', 'Жовтий'], 
        ['Червоний', 'Зелений', 'Рожевий'],
        ['Червоний', 'Жовтий', 'Рожевий'], 
        ['Зелений', 'Жовтий', 'Рожевий'], 
    ];

    protected array $colorClasses = [
        'Червоний' => 'red-bg',
        'Зелений' => 'green-bg',
        'Жовтий' => 'yellow-bg',
        'Рожевий' => 'orange-bg',
    ];

    public $shedule;

    public function mount()
    {
        $eventId = session('current_event', 0);
        $this->teams = Team::where('event_id', $eventId)->with('color')->get();
        $this->shedule = $this->getScheduleProperty($this->teams);

        $this->series1 = [
            ['Червоний', 'Зелений', 'Жовтий'], 
            ['Червоний', 'Зелений', 'Рожевий'],
            ['Червоний', 'Жовтий', 'Рожевий'], 
            ['Зелений', 'Жовтий', 'Рожевий'], 
        ];
    }

    public function getScheduleProperty($teams)
    {
                
        // Преобразуем в удобный массив: "Красная" => Team
        $teamsByColor = $teams->mapWithKeys(function ($team) {
            return [$team->color->name => $team];
        });

        $schedule = [];

        // Всего 12 туров, шаблон повторяется каждые 4
        for ($i = 0; $i < 12; $i++) {
            $templateIndex = $i % 4;
            $playingColors = $this->tourTemplate[$templateIndex];

            $playingTeams = collect($playingColors)
                ->map(fn($color) => $teamsByColor[$color] ?? null)
                ->filter(); // на случай, если какой-то команды нет

            $restingTeam = $teams->diff($playingTeams)->first();

            $schedule[] = [
                'round' => $i + 1,
                'playing' => $playingTeams,
                'resting' => $restingTeam,
            ];
        }

        return $schedule;
    }

    public function getBgClass($colorName): string
    {
        return $this->colorClasses[$colorName] ?? 'default-bg';
    }

    public function render()
    {
        return view('livewire.team-shedule-four');
    }
}
