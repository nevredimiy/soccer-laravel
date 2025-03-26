<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 
use App\Models\Event;
use App\Models\Team;

class EventList extends Component
{
    public $events;
    public $selectedCity = null;
    public $selectedDistrict = null;
    public $selectedLocation = null;
    public $selectedLeague = null;

    public function mount()
    {
        $this->selectedCity = session('current_city', 2);
        $this->updateEvents();        
    }

    // #[On('events-update')] 
    // public function updateEventList($data)
    // {
    //     dump($data);
    //     // Присваиваем коллекцию напрямую
    //     // if ($data && isset($data['events'])) {
    //     //     $this->events = collect($data['events']); // Обеспечиваем, что это коллекция
    //     // }
    // }


    #[On('city-selected')] 
    public function updateCityId($city_id)
    {
        $this->selectedCity = $city_id;
        $this->updateEvents();
    }

    #[On('district-selected')] 
    public function updateDistrictId($district_id)
    {
        $this->selectedDistrict = $district_id;
        $this->updateEvents();
    }

    #[On('location-selected')] 
    public function updateLocationId($location_id)
    {
        $this->selectedLocation = $location_id;
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

        // $this->events = $query->withCount('teams')->get()->groupBy('tournament_id');

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
