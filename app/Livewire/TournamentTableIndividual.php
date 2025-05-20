<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\TournamentService;
use Livewire\Attributes\On;
use Illuminate\Support\Collection;
use App\Models\SeriesMeta;

class TournamentTableIndividual extends Component
{
    public Collection $teams;
    public array $players = [];

    public function mount(array|Collection $teams = [], $eventId): void
    {
        $this->teams = TournamentService::getTeamsByEvent($eventId);
        $this->players = $this->getPlayers($eventId);
        // $this->roman = TournamentService::getRomanRounds($this->teams);ers($eventId);
    }

    #[On('eventSelected')]
    public function updateEventId($eventId): void
    {
        if ($eventId) {
            $this->teams = TournamentService::getTeamsByEvent($eventId);
            $this->players = $this->getPlayers($eventId);
            // $this->roman = TournamentService::getRomanRounds($this->teams);
        } else {
            $this->teams = collect();
            $this->players = [];
            // $this->roman = [];
        }
    }

    protected function getPlayers($eventId)
    {
        $seriesMetas = SeriesMeta::with(['seriesResults.player'])->where('event_id', $eventId)->get();

        foreach ($seriesMetas as $seriesMeta) {
            // Сортируем всю коллекцию результатов
            $sorted = $seriesMeta->seriesResults->sortByDesc('scores')->values();

            // Присваиваем места с учетом одинаковых значений
            $ranked = $sorted->map(function ($item, $index) use ($sorted) {
                if ($index > 0 && $item->scores === $sorted[$index - 1]->scores) {
                    $item->place = $sorted[$index - 1]->place;
                } else {
                    $item->place = $index + 1;
                }
                return $item;
            });

            // Если нужно сохранить обратно в модель
            $seriesMeta->rankedResults = $ranked;
        }

        $players = [];

        foreach ($seriesMetas as $seriesMeta) {
            $sorted = $seriesMeta->rankedResults->sortBy('place')->values();
            foreach ($sorted as $playerResult) {
                $players[] = [
                    'id' => $playerResult->player->id,
                    'name' => $playerResult->player->full_name,
                    'photo' => $playerResult->player->photo,
                    'rating' => $playerResult->player->rating,
                    'wins' =>$playerResult->wins,
                    'draw' => $playerResult->draw,
                    'defeat' => $playerResult->defeat,
                    'goals_scored' => $playerResult->goals_scored,
                    'goals_conceded' => $playerResult->goals_conceded,
                    'goal_difference' => $playerResult->goal_difference,
                    'points' => $playerResult->points,
                    'scores' => $playerResult->scores,
                    'place' => $playerResult->place,
                ];
            }
        }

        return $players;

    } 
    
    public function render()
    {
        return view('livewire.tournament-table-individual', [
            'roman' => TournamentService::getRomanRounds($this->teams),
        ]);
    }
}
