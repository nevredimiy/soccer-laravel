<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MatcheEvent;

class ManagerEventType extends Component
{

    public ?string $activeKey = null; 
    public array $type = ['football' => 'goal', 'boots-icon' => 'assist', 'red-football' => 'autogoal', 'yellow-card-icon' => 'yellow_card', 'red-card-icon' => 'red_card'];

    public function selecteEventType($key)
    {
         $this->activeKey = $key;
         session(['selected-type' => $this->type[$key]]);

    }   

    public function addEvent()
    {
        
        $type = session('selected-type', '0');
        $matchId = session('selected-match', '0');
        $teamId = session('selected-teamId', '0');
        $playerId = session('selected-player', '0');

        if(!$type){
            return session()->flash('error', 'Тип події не вибрано');
        }

        if(!$matchId){
            return session()->flash('error', 'Матч не вибрано');
        }
      
        if(!$playerId){
            return session()->flash('error', 'Гравця не вибрано');
        }

        MatcheEvent::create([
            'match_id' => $matchId,
            'team_id' => $teamId,
            'player_id' => $playerId,
            'type' => $type,
        ]);


        $this->dispatch('add-event');
        
    }

    public function deleteEvent()
    {
        $matchId = session('selected-match', '0');
        $teamId = session('selected-teamId', '0');

        if(!$matchId){
            return session()->flash('error', 'Матч не вибрано');
        }

        $lastEvent = MatcheEvent::where('match_id', $matchId)
            ->orderBy('created_at', 'desc')
            ->first();
        
        if ($lastEvent) {
            $lastEvent->delete();
        } else {
            session()->flash('error', 'Нет событий для удаления');
        }

        $this->dispatch('add-event');


    }

    public function render()
    {
        return view('livewire.manager-event-type');
    }
}
