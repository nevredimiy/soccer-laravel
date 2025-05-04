<?php

namespace App\Livewire;

use Livewire\Component;

class TournamentTableIndividual extends Component
{

    public $teams = [];
    public $players = [];
    public array $roman = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];

    public function mount($teams = [])
    {
        $this->teams = $teams;
        $this->players = $this->getPlayers($teams);
    }

    private function getPlayers($teams)
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
    
    public function render()
    {

        return view('livewire.tournament-table-individual');
    }
}
