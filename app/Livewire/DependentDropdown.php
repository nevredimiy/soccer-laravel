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
    public $city;
    public $districts;
    public $locations;
    public $leagues;

    public $selectedCity = null;
    public $selectedDistrict = null;
    public $selectedLocation = null;

    public function mount()
    {
        $this->selectedCity = session('current_city', 2);
        $this->cities = City::all(); 
        $this->districts = District::where('city_id', $this->selectedCity)->orderBy('name')->get();
    }

    public function updatedSelectedCity($city_id) 
    {
        session(['current_city' => $city_id]);
        
        $this->selectedCity = $city_id;

        $this->selectedDistrict = null;
        $this->selectedLocation = null;

        $this->districts = District::where('city_id', $city_id)->orderBy('name')->get();

        $this->locations = [];
        $this->leagues = [];

        $this->dispatch('city-selected', city_id: $city_id);
    }

    public function updatedSelectedDistrict($district_id) 
    {
        $this->selectedLocation = null;
        $this->locations = Location::where('district_id', $district_id)->get();
        $this->leagues = [];
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
