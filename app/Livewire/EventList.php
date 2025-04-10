<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 
use App\Models\Event;
use App\Models\Team;

class EventList extends Component
{
    public $eventList;
    public $selectedCity = null;
    public $selectedDistrict = null;
    public $selectedLocation = null;
    public $selectedLeague = null;
        
    public $events;
    public $tournament;
    
    

    public function mount($tournament)
    {

        $this->tournament = $tournament;
        $this->selectedCity = session('current_city', 2);

        $events = $tournament->events;
        // Загружаем все команды с игроками по событиям турнира
        $teams = Team::with('players')
        ->whereIn('event_id', $events->pluck('id'))
        ->get();

        // Группируем команды по event_id
        $teamsByEvent = $teams->groupBy('event_id');

       foreach ($events as $event) {
            $eventTeams = $teamsByEvent[$event->id] ?? collect();

            // Количество команд
            $event->teams_count = $eventTeams->count();

            // Средний рейтинг игроков
            $totalRating = 0;
            $totalPlayers = 0;

            foreach ($eventTeams as $team) {
                $players = $team->players;
                $totalRating += $players->sum('rating');
                $totalPlayers += $players->count();
            }

            $event->average_player_rating = $totalPlayers > 0
                ? round($totalRating / $totalPlayers, 2)
                : 0;
        }

        
        $this->events = $events;
        // $this->filterEvents();
        // $this->updateEvents();
    }


    #[On('city-selected')]
    public function updateCityId($city_id)
    {
        $this->selectedCity = $city_id;
        $this->selectedDistrict = null;
        $this->selectedLocation = null;
        $this->selectedLeague = null;
       
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
        $query = $this->tournament->events()->with('stadium.location.district');

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
     
        $this->events = $query->get();
    }

    public function render()
    {
        return view('livewire.event-list');
    }
}
