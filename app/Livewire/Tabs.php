<?php

namespace App\Livewire;

use Livewire\Component;

class Tabs extends Component
{
    public string $activeTab = 'tab1';
    public array $roman = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
    public $countTeams = [
        'tab1' => 4, 
        'tab2' => 6, 
        'tab3' => 9, 
        'tab4' => 17, 
    ];
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

    public $countSeries = [
        'tab1' => 1,
        'tab2' => 2,
        'tab3' => 3,
    ];

    public function selectTab(string $tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.tabs');
    }
}
