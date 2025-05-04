<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;
use App\Models\Event;

use Livewire\Attributes\On;


class TournamentInfo extends Component
{
    
    public $romeNum = ['I', 'II', 'III'];
    public $teams = [];
    public $eventId = null;
    public $event = null;

    public $colors = [
        '#ff0000', 
        '#00b050',
        '#ffff00',
        '#ff7f27',
        '#0070c0',
        '#808080',
        '#99d9ea',
        '#9bbb59',
        '#ff99ff',
    ];

    protected array $tourTemplate = [
        ['Червоний', 'Зелений', 'Жовтий'], 
        ['Червоний', 'Зелений', 'Рожевий'],
        ['Червоний', 'Жовтий', 'Рожевий'], 
        ['Зелений', 'Жовтий', 'Рожевий'], 
    ];

    public array $series1 = [];

    protected array $colorClasses = [
        'Червоний' => 'red-bg',
        'Зелений' => 'green-bg',
        'Жовтий' => 'yellow-bg',
        'Рожевий' => 'orange-bg',
    ];

    public $shedule = [];

    public function mount()
    {
        $eventId = session('current_event', 0);
        $this->event = Event::with('tournament')->find($eventId);
        $this->teams = $this->getTeams($eventId);
        $this->shedule = $this->getScheduleProperty($this->teams);

        
        $this->series1 = [
            ['Червоний', 'Зелений', 'Жовтий'], 
            ['Червоний', 'Зелений', 'Рожевий'],
            ['Червоний', 'Жовтий', 'Рожевий'], 
            ['Зелений', 'Жовтий', 'Рожевий'], 
        ];        
    }

    private function getTeams($eventId)
    {
        $teams = Team::where('event_id', $eventId)->with(['color', 'players'])->get();
        foreach($teams as $team){
            $totalRating = 0;
            $totalPlayers = 0;
            $players = $team->players;
            
            $totalRating = $players->sum('rating');
            $totalPlayers = $players->count();
            $team->rating = $totalPlayers > 0 ? round($totalRating / $totalPlayers) : 0;
        }

        return $teams;
    }

    public function getBgClass($colorName): string
    {
        return $this->colorClasses[$colorName] ?? 'default-bg';
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


    #[On('eventSelected')]
    public function updateEventId($eventId)
    {
        if($eventId){
            $this->eventId = $eventId;
            $this->teams = $this->getTeams($eventId);
            $this->event = Event::with('tournament')->find($eventId);
        } else {
            $this->teams = [];
        }
    }



    public function render()
    {
        return view('livewire.tournament-info');
    }
}
