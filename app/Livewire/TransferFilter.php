<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;
use App\Models\TeamPlayerApplication;
use Illuminate\Support\Collection;

class TransferFilter extends Component
{
    public Team $team;
    public $minAge = 16;
    public $maxAge = null;
    public $minRating = 1;

    public function mount(Team $team)
    {

        $this->team = $team;
    }
    
    public function getFilteredApplicationsProperty(): Collection
    {
        $query = TeamPlayerApplication::with('user.player')
            ->where('team_id', $this->team->id);

        if ($this->minAge) {
            $query->whereHas('user.player', function ($q) {
                $q->whereRaw('TIMESTAMPDIFF(YEAR, birth_date, NOW()) >= ?', [$this->minAge]);
            });
        }

        if ($this->maxAge) {
            $query->whereHas('user.player', function ($q) {
                $q->whereRaw('TIMESTAMPDIFF(YEAR, birth_date, NOW()) <= ?', [$this->maxAge]);
            });
        }

        if ($this->minRating) {
            $query->whereHas('user.player', function ($q) {
                $q->where('rating', '>=', $this->minRating);
            });
        }

        $applications = $query->get();

        $this->dispatch('applicationsFiltered', applications: $applications);
        return $applications;
    }

    public function render()
    {
        return view('livewire.transfer-filter', [
            'applications' => $this->filteredApplications,
        ]);
    }
}
