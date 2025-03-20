<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CIty;
use Livewire\Attributes\On; 

class CityEmblem extends Component
{


    public $city;
    public $cityId = null;
   


    public function mount()
    {
        $this->city = City::where('id', '=', '2')->get();
    }

    #[On('city-selected')] 
    public function updateCityId($city_id)
    {
        $this->city = City::where('id', $city_id)->get();
    }

    // public function updatedSelectedCity($city_id) 
    // {
    //     $this->city = City::where('city_id', $city_id)->get();
    // }

    public function render()
    {
        return view('livewire.city-emblem');
    }
}
