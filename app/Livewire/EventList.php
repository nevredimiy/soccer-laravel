<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 
use App\Models\Event;
use App\Models\Team;

class EventList extends Component
{
    public $events;
    public $eventList;
    public $selectedCity = null;
    public $selectedDistrict = null;
    public $selectedLocation = null;
    public $selectedLeague = null;

    public function mount()
    {
        $this->selectedCity = session('current_city', 2);
        // $this->selectedDistrict = session('current_district', 0);
        // $this->selectedLocation = session('current_location', 0);
        // $this->selectedLeague = session('current_league', 0);
        $query = Event::query()->with(['stadium', 'teams']);
        
        if ($this->selectedCity) {
            $query->whereHas('stadium.location.district.city', function ($q) {
                $q->where('id', $this->selectedCity);
            });
        }

        $this->updateEvents();
    
    }

    #[On('city-selected')]
    public function updateCityId($city_id)
    {
        $this->selectedCity = $city_id;
        $this->selectedDistrict = null;
        $this->selectedLocation = null;
       
        $this->updateEvents();
    }
    
    
    #[On('district-selected')]
    public function updateSelectedDistrict($district_id)
    {
        $this->selectedDistrict = $district_id;
        $this->selectedLocation = null;
        $this->selectedLeague = null;
        $this->updateEvents();
    }
        
    #[On('location-selected')]
    public function updateLocationId($location_id)
    {
        $this->selectedLocation = $location_id;
        $this->selectedLeague = null;
        $this->updateEvents();
    }
        
    #[On('league-selected')]
    public function updateLeagueId($league_id)
    {
        $this->selectedLeague = $league_id;
        $this->updateEvents();
    }



    public function updateEvents()
    {
        $query = Event::query()->with(['stadium.location', 'teams']);


        if ($this->selectedCity) {
            $query->whereHas('stadium.location.district.city', function ($q) {
                $q->where('id', $this->selectedCity);
            });
        }

        if ($this->selectedDistrict) {
            $query->whereHas('stadium.location.district', function ($q) {
                $q->where('id', $this->selectedDistrict);
            });
        }

        if ($this->selectedLocation) {
            $query->whereHas('stadium.location', function ($q) {
                $q->where('id', $this->selectedLocation);
            });
        }

        if ($this->selectedLeague) {
            $query->where('league_id', $this->selectedLeague);
        }

        // Получаем коллекцию и группируем по tournament_id
        $groupedEvents = $query->withCount('teams')->get()->groupBy('tournament_id');

        // Преобразуем коллекцию в массив, чтобы избежать ошибки
        $this->events = $groupedEvents->map(fn($events) => $events->toArray())->toArray();
     
    }

    public function render()
    {
        return view('livewire.event-list');
    }
}
