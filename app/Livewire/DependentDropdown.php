<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\City;
use App\Models\District;
use App\Models\Location;
use App\Models\League;
use App\Models\Event;

class DependentDropdown extends Component
{

    public $cities;
    public $city;
    public $districts;
    public $locations;
    public $leagues;
    public $events = [];

    public $selectedCity = null;
    public $selectedDistrict = null;
    public $selectedLocation = null;
    public $selectedLeague = null;

    public function mount()
    {
        $this->selectedCity = session('current_city', 2);
        $this->cities = City::all(); 
        $this->districts = District::where('city_id', $this->selectedCity)->orderBy('name')->get();
        $this->updateEvents();
    }

    public function updatedSelectedCity($city_id) 
    {
        session(['current_city' => $city_id]);
        
        $this->selectedCity = $city_id;
        $this->selectedDistrict = null;
        $this->selectedLocation = null;
        $this->selectedLeague = null;

        $this->districts = District::where('city_id', $city_id)->orderBy('name')->get();
        $this->locations = [];
        $this->leagues = [];
        $this->updateEvents();
        $this->dispatch('city-selected', city_id: $city_id);
    }

    public function updatedSelectedDistrict($district_id) 
    {
        $this->selectedLocation = null;
        $this->selectedLeague = null;
        $this->locations = Location::where('district_id', $district_id)->get();
        $this->leagues = [];
        $this->updateEvents();
        $this->dispatch('district-selected', district_id: $district_id);
    }

    public function updatedSelectedLocation($location_id) 
    {
        $this->selectedLeague = null;
        $this->leagues = League::where('location_id', $location_id)->get();
        $this->updateEvents();
        $this->dispatch('location-selected', location_id: $location_id);
    }
    
    public function updatedSelectedLeague($league_id)
    {
        $this->updateEvents();
        $this->dispatch('league-selected', league_id: $league_id);
        
    }

    public function updateEvents()
    {
        $query = Event::query();

        if ($this->selectedCity) {
            $query->whereHas('location.district.city', function ($q) {
                $q->where('id', $this->selectedCity);
            });
        }

        if ($this->selectedDistrict) {
            $query->whereHas('location.district', function ($q) {
                $q->where('id', $this->selectedDistrict);
            });
        }

        if ($this->selectedLocation) {
            $query->where('location_id', $this->selectedLocation);
        }

        if ($this->selectedLeague) {
            $query->where('league_id', $this->selectedLeague);
        }

        $this->events = $query->get();
        // $this->dispatch('events-update', events: $this->events);
        
    }


    public function render()
    {
        return view('livewire.dependent-dropdown');
    }
}
