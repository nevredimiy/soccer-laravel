<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;

class TeamSheduleSix extends Component
{

    public $teams = null;
    public array $series1 = [];
    public array $series2 = [];

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

        
        // Шаблоны туров
        $this->series1 = [
            [$teamIds[0], $teamIds[1], $teamIds[2]],
            [$teamIds[4], $teamIds[1], $teamIds[3]],
            [$teamIds[3], $teamIds[4], $teamIds[2]],
            [$teamIds[5], $teamIds[1], $teamIds[2]],
            [$teamIds[4], $teamIds[2], $teamIds[1]],
            [$teamIds[1], $teamIds[3], $teamIds[0]],
            [$teamIds[5], $teamIds[1], $teamIds[3]],
            [$teamIds[3], $teamIds[2], $teamIds[0]],
            [$teamIds[1], $teamIds[0], $teamIds[4]],
            [$teamIds[5], $teamIds[4], $teamIds[0]],
        ];

        $this->series2 = [
            [$teamIds[3], $teamIds[4], $teamIds[5]],
            [$teamIds[0], $teamIds[2], $teamIds[5]],
            [$teamIds[5], $teamIds[0], $teamIds[1]],
            [$teamIds[3], $teamIds[4], $teamIds[0]],
            [$teamIds[0], $teamIds[3], $teamIds[5]],
            [$teamIds[2], $teamIds[5], $teamIds[4]],
            [$teamIds[0], $teamIds[4], $teamIds[2]],
            [$teamIds[4], $teamIds[1], $teamIds[5]],
            [$teamIds[2], $teamIds[5], $teamIds[3]],
            [$teamIds[1], $teamIds[3], $teamIds[2]],
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

    public function selectedRound($roundNumber, $eventId, $seriesNum)
    {
        dump('Выбран тур:', $roundNumber);
        dump('ID события:', $eventId);
        dump('Номер серии:', $seriesNum);
    
      
    }


    public function render()
    {
        return view('livewire.team-shedule-six');
    }
}
