<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;
use App\Models\Player;
use App\Models\User;
use App\Models\Matche;
use App\Models\SeriesMeta;
use App\Models\PlayerSeriesRegistration;
use App\Services\SeriesTemplatesService;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\PlayerTeam;

class PlacesOfSeries extends Component
{
    public $team = null;
    public $seriesTeams = [];
    public $formatDate = '';
    public ?Matche $matche = null;
    public $maxPlayer = 6;
    public $showModal = false;
    public $userId; 
    public $playerId = null;
    public $isPlayerReserve = false;
    public $regPlayers = null;
    public $minBalance;
    public $desiredBalance;

    public function mount($team)
    {
        $this->team = $team;
        $this->userId = Auth::id();
        $player = Player::where('user_id', $this->userId)->first();
        $this->playerId = $player ? $player->id : null;
        $today = Carbon::today()->format('Y-m-d H:i:s'); 
        $this->matche = $this->team->event->matches()
            ->where('start_time', '>=', Carbon::today())
            ->where('team1_id', $this->team->id)
            ->whereOr('team2_id', $this->team->id)
            ->first();
        
        $this->formatDate = Carbon::parse($this->matche->start_time);
        $service = new SeriesTemplatesService();
        $idxTeamIds = $service->getTeamIds($this->team->event->format_scheme, $this->matche->series, $this->matche->round - 1);
        $teams = Team::with('color')->where('event_id', $this->team->event->id)->get()->toArray();

        foreach($idxTeamIds as $key => $id){
            $this->seriesTeams[$key]['name'] = $teams[$id]['name'];
            $this->seriesTeams[$key]['classColor'] = $service->getColorClass($teams[$id]['color']['name']);
        }
                
        if ($this->team) {
            $this->maxPlayer = $this->team->max_players;
        }

        $this->checkStatusPlayer();
        $this->getPlayerSeriesRegistration();

    }

    public function dropRegPlayer($player_id)
    {
        PlayerSeriesRegistration::where('player_id', $player_id)
            ->where('event_id', $this->team->event->id)
            ->where('series_number', $this->matche->series)
            ->delete();
        $this->getPlayerSeriesRegistration();
    }

    #[On('togglePlayerStatus')]
    public function updatePlayerStatus($playerStatus)
    {
        if ($playerStatus == 'reserve') {
            $this->isPlayerReserve = true;
        } else {
            $this->isPlayerReserve = false;
        }
    }

    protected function checkStatusPlayer()
    {
        $statusPlayer = PlayerTeam::where('player_id', $this->playerId)->where('team_id', $this->team->id)->first()->status;

        if ($statusPlayer == 'reserve') {
            $this->isPlayerReserve = true;
            return;
        }
    }

    public function takePlace($numPlayer = 0)
    {

        $user = User::find($this->userId);
        $balance = $user->balance;
        $price = SeriesMeta::where('event_id',$this->team->event->id)
            ->where('series', $this->matche->series)
            ->where('round', $this->matche->round)->value('price');
        $this->minBalance = $price / 6;
        $this->desiredBalance = $this->minBalance - $balance;
        
        if($this->minBalance >= $balance){
            $this->showModal = true;
            return;
        }


        $existing = PlayerSeriesRegistration::where('player_id', $this->playerId)
            ->where('series_number', $this->matche->series)
            ->where('event_id', $this->team->event->id)
            ->exists();

        if ($existing) {
            session()->flash('message', 'Ви вже зареєстровані в цій серії.');
            return; // Прерываем выполнение
        }

        if($numPlayer){
            DB::table('player_series_registrations')->insert([
                'event_id' => $this->team->event->id,
                'player_id' => $this->playerId,
                'player_number' => $numPlayer,
                'series_number' => $this->matche->series,
            ]);
        }
        $this->getPlayerSeriesRegistration();
      
    }

    protected function getPlayerSeriesRegistration()
    {
        $this->regPlayers = PlayerSeriesRegistration::with('player')
            ->where('event_id', $this->team->event->id)
            ->where('series_number', $this->matche->series)
            ->get();
    }

    #[On('updateMaxPlayer')]
    public function updateMaxPlayer($maxPlayer)
    {
        $this->maxPlayer = $maxPlayer;        
    }

    public function checkBalance()
    {
      $this->showModal = true;   
    }

    public function save()
    {
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.places-of-series');
    }
}
