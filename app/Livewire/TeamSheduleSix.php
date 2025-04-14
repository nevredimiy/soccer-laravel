<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;

class TeamSheduleSix extends Component
{

    public $teams;

    public array $series1 = [];
    public array $series2 = [];

    protected array $colorClasses = [
        'Жовтий' => 'yellow-bg',
        'Помаранчевий' => 'orange-bg',
        'Зелений' => 'green-bg',
        'Сірий' => 'gray-bg',
        'Синій' => 'blue-bg',
        'Червоний' => 'red-bg',
    ];

    public function mount()
    {

        $eventId = session('current_event', 0);
        $this->teams = Team::where('event_id', $eventId)->with('color')->get();

        
        // Шаблоны туров
        $this->series1 = [
            ['Жовтий', 'Помаранчевий', 'Зелений'],
            ['Синій', 'Помаранчевий', 'Сірий'],
            ['Сірий', 'Синій', 'Зелений'],
            ['Червоний', 'Помаранчевий', 'Зелений'],
            ['Синій', 'Зелений', 'Помаранчевий'],
            ['Помаранчевий', 'Сірий', 'Жовтий'],
            ['Червоний', 'Помаранчевий', 'Сірий'],
            ['Сірий', 'Зелений', 'Жовтий'],
            ['Помаранчевий', 'Жовтий', 'Синій'],
            ['Червоний', 'Синій', 'Жовтий'],
        ];

        $this->series2 = [
            ['Сірий', 'Синій', 'Червоний'],
            ['Жовтий', 'Зелений', 'Червоний'],
            ['Червоний', 'Жовтий', 'Помаранчевий'],
            ['Сірий', 'Синій', 'Жовтий'],
            ['Жовтий', 'Сірий', 'Червоний'],
            ['Зелений', 'Червоний', 'Синій'],
            ['Жовтий', 'Синій', 'Зелений'],
            ['Синій', 'Помаранчевий', 'Червоний'],
            ['Зелений', 'Червоний', 'Сірий'],
            ['Помаранчевий', 'Сірий', 'Зелений'],
        ];

    }

   

    public function getBgClass($colorName): string
    {
        return $this->colorClasses[$colorName] ?? 'default-bg';
    }

    public function render()
    {
        return view('livewire.team-shedule-six');
    }
}
