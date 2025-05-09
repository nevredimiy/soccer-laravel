<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;
use App\Models\Event;
use App\Models\Player;
use App\Models\EventTeamPrice;

class TeamList extends Component
{

    public $teams;
    public $activeTeamId;
    public $userId;
    
    public function mount()
    {
        $this->userId = auth()->id();
    
        // Получаем ID всех команд, где участвует игрок
        $playerTeamIds = \DB::table('player_teams')
            ->where('player_id', function ($query) {
                $query->select('id')
                    ->from('players')
                    ->where('user_id', $this->userId)
                    ->limit(1);
            })
            ->pluck('team_id');
        
        $this->teams = Team::with(['event.seriesMeta.stadium', 'color'])
            ->where('owner_id', $this->userId)
            ->orWhereIn('id', $playerTeamIds)
            ->orderByDesc('id')
            ->get();

        $this->activeTeamId = ($this->teams->first())->id;

        //  Получаем сумму неоплаченной команды
        $awaitingPaymentTeams = $this->teams->where('status', 'awaiting_payment')->sortBy('id');
        foreach($awaitingPaymentTeams as $t){
            $eventTeams = Team::where('event_id', $t->event_id)->orderBy('id')->get();
            $eventTeamPrices = EventTeamPrice::where('event_id', $t->event_id)->get()->toArray();

            foreach($eventTeams as $idxEvT => $eventTeam){
                if($eventTeam->id == $t->id){
                    $t->amount = $eventTeamPrices[$idxEvT]['price'];
                }
            }
        }
       
    }
    

    public function selectTeam($teamId)
    {
        
        $this->activeTeamId = $teamId;
        $this->dispatch('team-selected', team_id: $teamId);
    }

    public function render()
    {
        return view('livewire.team-list');
    }
}
