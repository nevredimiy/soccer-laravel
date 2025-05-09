<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;
use App\Models\Player;
use App\Models\SeriesPlayer;
use App\Models\User;
use App\Models\Matche;
use App\Models\Event;
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

    public ?Event $event = null;
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
        $today = Carbon::now()->timezone(config('app.timezone'))->format('Y-m-d H:i:s'); 
        $event = Event::with('tournament')->find($team->event_id);        
        
        $this->seriesMeta = SeriesMeta::where('event_id', $event->id)->where('start_date', '>', $today)->orderBy('start_date')->first();

        $service = new SeriesTemplatesService();

        $templateSeries = $service->getTemplateShedule($event->tournament->count_teams);
        $teams = Team::with('color')->where('event_id', $this->team->event->id)->get()->toArray();

        foreach($templateSeries[$this->seriesMeta->round-1][$this->seriesMeta->series-1] as $key => $teamIndex){
            if(isset($teams[$teamIndex])){
                $this->seriesTeams[$key]['name'] = $teams[$teamIndex]['name'];
                $this->seriesTeams[$key]['classColor'] = $service->getColorClass($teams[$teamIndex]['color']['name']);
            }else {
                $this->seriesTeams[$key]['name'] = 'Очікуємо';
                $this->seriesTeams[$key]['classColor'] = 'default-bg';
            }
        }
                
        if ($this->team) {
            $this->maxPlayer = $this->team->max_players;
        }

        if($this->playerId){
            $this->checkStatusPlayer();         
        }
        $this->getPlayerSeries();
        $this->statusRegistration = $this->seriesMeta?->status_registration;    
    }

    #[On('team-selected')]
    public function updateSelectedTeam($team_id)
    {
        $this->team = Team::find($team_id);
        $this->getPlayerSeries();
    }

    public function dropRegPlayer($player_id)
    {
        SeriesPlayer::where('player_id', $player_id)
            ->where('team_id', $this->team->id)
            ->where('series_meta_id', $this->seriesMeta->id)
            ->delete();
        $this->getPlayerSeries();
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
        $statusPlayer = PlayerTeam::where('player_id', $this->playerId)->where('team_id', $this->team->id)->first()?->status;

        if ($statusPlayer == 'reserve') {
            $this->isPlayerReserve = true;
            return;
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function takePlace($playerNumber = 0)
    {
        $eventId = $this->team->event->id;
        $teamId = $this->team->id;
        $playerId = $this->playerId;
       
        $event = Event::with('tournament')->find($eventId);

        // 1. Проверка: резервный игрок
        $status = PlayerTeam::where('player_id', $playerId)
            ->where('team_id', $teamId)
            ->value('status');

        if ($status === 'reserve') {
            return redirect()->to('/profile');
        }

        // 2. Проверка: баланс
        $balance = User::find($this->userId)?->balance ?? 0;

        $price = $this->seriesMeta->price;

        if($event->tournament->team_creator == 'admin'){
            $this->minBalance = ceil($price / 18); // 18 это количество игроков в турнире. По 6 в команде.
        }else {
            $this->minBalance = ceil($price / 6); // минимальное количество в команде.
        }
        $this->desiredBalance = $this->minBalance - $balance;

        if ($balance < $this->minBalance) {
            $this->showModal = true;
            return;
        }

        // 3. Проверка: не зарегистрирован ли уже
        $alreadyRegistered = SeriesPlayer::where('series_meta_id', $this->seriesMeta->id)->where('player_id', $this->playerId)->where('team_id', $this->team->id)->exists();

        if ($alreadyRegistered) {
            session()->flash('message', 'Ви вже зареєстровані в цій серії.');
            return;
        }

        if($playerNumber){
            SeriesPlayer::create([
                'player_id' => $playerId,
                'series_meta_id' => $this->seriesMeta->id,
                'player_number' => $playerNumber,
                'team_id' => $teamId
            ]);
        }

        $this->getPlayerSeries();


    }

    protected function getPlayerSeries()
    {
        $this->regPlayers = SeriesPlayer::with('player')
            ->where('series_meta_id', $this->seriesMeta->id)
            ->where('team_id', $this->team->id)
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
        $seriesPlayers = SeriesPlayer::query()
            ->where('series_meta_id', '=', $this->SeriesMeta->id)
            ->where('team_id', '=', $this->team->id)
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
