<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\City;
use App\Models\District;
use App\Models\Location;
use App\Models\League;

class DependentDropdown extends Component
{

    public $cities;
    public $districts;
    public $locations;
    public $leagues;

    public $selectedCity = null;
    public $selectedDistrict = null;
    public $selectedLocation = null;

    public function mount()
    {
        $this->cities = City::all(); 
    }

    public function updatedSelectedCity($city_id) 
    {
        $this->districts = District::where('city_id', $city_id)->get();

        $this->dispatch('city-selected', city_id: $city_id);
    }

    public function updatedSelectedDistrict($district_id) 
    {
        $this->locations = Location::where('district_id', $district_id)->get();
    }

    public function updatedSelectedLocation($location_id) 
    {
        $this->leagues = League::where('location_id', $location_id)->get();
    }


    public function render()
    {
        return view('livewire.dependent-dropdown');
    }
}
