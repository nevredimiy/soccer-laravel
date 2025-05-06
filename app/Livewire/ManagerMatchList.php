<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 
use App\Models\Matche;
use App\Models\City;
use App\Models\District;
use App\Models\Location;
use App\Models\Stadium;
use App\Models\SeriesMeta;
use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

class ManagerMatchList extends Component
{

    public ?Collection $matches = null;
    public ?Collection $stadiums = null;
    public ?Collection $events = null;


    public $selectedCity = null;
    public $selectedDistrict = null;
    public $selectedLocation = null;
    public $selectedTournament = null;
    public $selectedLeague = null;
    public $selectedEvent = null;

    public function mount()
    {
        $this->selectedCity = session('current_city', 2);
        $this->selectedEvent = session('current_event', 0);

        $eventIds = SeriesMeta::query()
        ->whereIn('stadium_id', function ($query) {
            $query->select('id')
                ->from('stadiums')
                ->whereIn('location_id', function ($query) {
                    $query->select('id')
                        ->from('locations')
                        ->whereIn('district_id', function ($query) {
                            $query->select('id')
                                ->from('districts')
                                ->where('city_id', $this->selectedCity);
                        });
                });
        })
        ->pluck('event_id');

        $this->matches = Matche::query()
            ->where('status', '!=', 'finished')
            ->whereIn('event_id', $eventIds)
            ->get();
        $this->events = Event::query()
            ->whereIn('id', $eventIds)
            ->get();
       
        $this->updateMatches();
    }

    #[On('city-selected')]
    public function updateCityId($city_id)
    {
        $this->selectedCity = $city_id;
        $this->selectedDistrict = null;
        $this->selectedLocation = null;
        $this->selectedTournament = null;
        $this->selectedLeague = null;
       
        $this->updateMatches();
    }

    #[On('district-selected')]
    public function updateSelectedDistrict($district_id)
    {
        $this->selectedDistrict = $district_id;
        $this->selectedLocation = null;
        $this->selectedTournament = null;
        $this->selectedLeague = null;

        $this->updateMatches();
    }

    #[On('location-selected')]
    public function updateLocationId($location_id)
    {
        $this->selectedLocation = $location_id;
        $this->selectedTournament = null;
        $this->selectedLeague = null;

        $this->updateMatches();
    }

    #[On('typeTournamentSelected')]
    public function updateTournament($typeTournament)
    {

        $this->selectedTournament = $typeTournament;
        $this->updateMatches();
    }

    #[On('league-selected')]
    public function updateLeagueId($league_id)
    {
        $this->selectedLeague = $league_id;
        $this->updateMatches();
    }

    public function updatedSelectedEvent($event_id)
    {
        session(['current_event' => $event_id]); 
        $this->updateMatches();
    }

    protected function updateMatches()
    {
        $seriesQuery = SeriesMeta::query()->with('stadium.location.district');

        if ($this->selectedLocation) {
            $seriesQuery->whereHas('stadium.location', function ($q) {
                $q->where('id', $this->selectedLocation);
            });
        } elseif ($this->selectedDistrict) {
            $seriesQuery->whereHas('stadium.location', function ($q) {
                $q->where('district_id', $this->selectedDistrict);
            });
        } elseif ($this->selectedCity) {
            $seriesQuery->whereHas('stadium.location.district', function ($q) {
                $q->where('city_id', $this->selectedCity);
            });
        }

        if ($this->selectedLeague) {
            $seriesQuery->where('league_id', $this->selectedLeague);
        }

        $eventIds = $seriesQuery->pluck('event_id');

        // Если выбран конкретный event — ограничиваем только им
        if ($this->selectedEvent) {
            $eventIds = collect([$this->selectedEvent]);
        }

        $matchQuery = Matche::query()
            ->where('status', '!=', 'finished')
            ->whereIn('event_id', $eventIds);

        if ($this->selectedTournament) {
            $matchQuery->whereHas('event.tournament', function ($q) {
                $q->where('type', $this->selectedTournament);
            });
        }

        $this->matches = $matchQuery->get();
    }

   
    public function render()
    {
        return view('livewire.manager-match-list');
    }
}
