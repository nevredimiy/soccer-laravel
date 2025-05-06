<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;
use Livewire\Attributes\On;

class TournamentTableIndividual extends Component
{

    public $teams = [];
    public $players = [];
    public array $roman = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
    public $eventId = null;

    public function mount($teams = [])
    {
        $this->teams = $teams;
        $this->players = $this->getPlayers($teams);
    }

    protected function getPlayers($teams)
    {
        $players = [];
        foreach ($teams as $team) {
            foreach ($team->players as $player) {
                $players[] = [
                    'id' => $player->id,
                    'number' => $player->number,
                    'name' => $player->full_name,
                    'photo' => $player->photo,
                    'rating' => $player->rating,
                    'team' => $team->name,
                    'color' => $team->color->name,
                ];
            }
        }
        return $players;
    }    

    protected function getTeams($eventId)
    {
        $teams = Team::where('event_id', $eventId)->with(['color', 'players'])->get();       

        return $teams;
    }

    #[On('eventSelected')]
    public function updateEventId($eventId)
    {
        if($eventId){
            $this->eventId = $eventId;
            $this->teams = $this->getTeams($eventId);
            $this->players = $this->getPlayers($this->teams);
        } else {
            $this->teams = [];
        }
    }
    
    public function render()
    {

        return view('livewire.tournament-table-individual');
    }
}
