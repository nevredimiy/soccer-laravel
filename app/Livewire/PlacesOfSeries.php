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
    public ?Matche $matche = null;
    public ?Team $team = null;
    public ?SeriesMeta $seriesMeta = null;
    public $userId = null; 
    public $playerId = null;
    public $seriesTeams = [];
    public $formatDate = '';
    public $maxPlayer = 6;
    public $showModal = false;
    public $isPlayerReserve = false;
    public $regPlayers = null;
    public $minBalance = 0;
    public $desiredBalance = 0;
    public $statusRegistration = 'open';

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
            // dd($this->matche);
        $this->seriesMeta = SeriesMeta::query()
            ->where('event_id', '=', $this->matche->event_id)
            ->where('series', '=', $this->matche->series)
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
        $this->statusRegistration = $this->seriesMeta->status_registration;


        
        
    }

    public function dropRegPlayer($player_id)
    {
        PlayerSeriesRegistration::where('player_id', $player_id)
            ->where('team_id', $this->team->id)
            ->where('series', $this->matche->series)
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

        if($this->userId == $this->team->owner_id){
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

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function takePlace($numPlayer = 0)
    {
        // проверка статуса Основной / Резервный
        $status = PlayerTeam::where('player_id', '=', $this->playerId)->value('status');
        if($status == 'reserve') {
            return redirect()->to('/profile');
        }       
        
        // Проверка баланса
        $user = User::find($this->userId);
        $balance = $user->balance;
        $price = SeriesMeta::where('event_id',$this->team->event->id)
            ->where('series', $this->matche->series)
            ->value('price');
        if(!$price){
            $price = SeriesMeta::where('event_id',$this->team->event->id)->first()->value('price');
        }
        $this->minBalance = ceil($price / 6);
        $this->desiredBalance = $this->minBalance - $balance;            
        if($this->minBalance > $balance){
            $this->showModal = true;
            return;
        }

        // Проверка повторной регистрации
        $existing = PlayerSeriesRegistration::where('player_id', $this->playerId)
            ->where('series', $this->matche->series)
            ->where('team_id', $this->team->id)
            ->exists();
        if ($existing) {
            session()->flash('message', 'Ви вже зареєстровані в цій серії.');
            return; // Прерываем выполнение
        }

        // Добавление игрока в серию
        if($numPlayer){
            PlayerSeriesRegistration::create([
                'event_id' => $this->team->event->id,
                'team_id' => $this->team->id,
                'player_id' => $this->playerId,
                'player_number' => $numPlayer,
                'series' => $this->matche->series,
                'round' => $this->matche ? $this->matche->round : null,
            ]);
        }
        $this->getPlayerSeriesRegistration();
        
    }

    protected function getPlayerSeriesRegistration()
    {
        $this->regPlayers = PlayerSeriesRegistration::with('player')
            ->where('team_id', $this->team->id)
            ->where('series', $this->matche->series)
            ->get();  
           
        // Проверка на Закрывать заявку или нет
        if($this->statusRegistration == 'open'){
            $maxPlayers = $this->team->max_players;
            
            if($maxPlayers <= $this->regPlayers->count())
            {
                $this->closeRegistrations();
            }
        }
    }

    public function closeRegistrations()
    {
        //
        $this->seriesMeta->update(['status_registration' => 'closed']);
        $this->statusRegistration = 'closed';
        // списание баланса

        $seriesPlayers = PlayerSeriesRegistration::query()
            ->with('player')
            ->where('team_id', '=', $this->team->id)
            ->where('event_id', '=', $this->team->event->id)
            ->where('series', '=', $this->matche->series)
            ->where('round', '=', $this->matche->round)
            ->get();
        
        $seriesPrice = SeriesMeta::query()
            ->where('event_id', '=', $this->team->event->id)
            ->where('series', '=',  $this->matche->series)
            ->value('price');
        
        $writeOffAmount = round($seriesPrice / $seriesPlayers->count());
        $balance = 0;

        foreach($seriesPlayers as $player){
            $balance = User::query()
                ->where('id', $player->player->user_id)
                ->value('balance');
            User::query()
                ->where('id', $player->player->user_id)
                ->update(['balance' => $balance - $writeOffAmount]);
        }
        
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
