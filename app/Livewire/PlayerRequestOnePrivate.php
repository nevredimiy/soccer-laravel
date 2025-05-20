<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\Player;
use App\Models\PlayerTeam;
use App\Models\SeriesMeta;
use App\Models\SeriesPlayer;
use App\Models\Team;

class PlayerRequestOnePrivate extends Component
{

    public ?Event $event = null;
    public ?SeriesMeta $seriesMeta = null;
    public $regPlayers = [];
    public array $playerIds = [];
    public $playerPrice = 0;
    public $missingAmount = 0;
    public $user = null;
    public $currentPlayer = null;

    public function mount($event, $playerPrice = 0)
    {
        //Непаримся. Берем первую серию. Так как у данного турнира всегда всего одна серия.
        $this->seriesMeta = SeriesMeta::with('seriesPlayers')->where('event_id', $this->event->id)->first();
        $this->event = $event;
        $this->playerPrice = $playerPrice;
        $this->user = auth()->user();
        $this->currentPlayer = Player::query()->where('user_id', $this->user->id)->first();

        $this->loadPlayers();

    }

    public function BookingPlace($teamId, $playerNumber)
    {
       
        if(in_array($this->currentPlayer->id, $this->playerIds)){
            session()->flash('error', 'Ви вже в серії!');
            return;
        }

        $balance = $this->user->balance;
        $this->missingAmount = $this->playerPrice - $balance;
        if($balance < $this->playerPrice){
            session()->flash('error_balance', "Недостатньо коштів на балансі! Мінімальна сумма $this->playerPrice грн.");
            return;
        }

        SeriesPlayer::create([
            'series_meta_id' => $this->seriesMeta->id,
            'player_id' => $this->currentPlayer->id,
            'team_id' => $teamId,
            'player_number' => $playerNumber,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // записываем игрока в команду
        PlayerTeam::query()->create([
            'player_id' => $this->currentPlayer->id,
            'team_id' => $teamId,
            'status' => 'main',
            'player_number' => $playerNumber,
        ]);

        $this->loadPlayers();
    }

    public function deletePlayer()
    {
        $teamIds = Team::where('event_id', $this->event->id)->pluck('id');

        SeriesPlayer::where('player_id', $this->currentPlayer->id)
            ->where('series_meta_id', $this->seriesMeta?->id)
            ->first()?->delete();

        PlayerTeam::where('player_id', $this->currentPlayer->id)
            ->whereIn('team_id', $teamIds)
            ->first()?->delete(); // безопасный вызов
        session()->flash('success', 'Гравця успішно видалено зі складу команды.');

        // обновляем компонент
        $this->loadPlayers();
    }

    public function loadPlayers()
    {
        $this->regPlayers = [];
        $this->playerIds = [];



        foreach ($this->event->teams as $team) {
            $playerTeams = PlayerTeam::query()
                ->where('team_id', '=', $team->id)
                ->get();

            foreach ($team->players as $player) {
                $this->playerIds[] = $player->id;
                
                $this->regPlayers[$team->id][] = [
                    'id' => $player->id,
                    'first_name' => $player->first_name,
                    'last_name' => $player->last_name,
                    'photo' => $player->photo,
                    'rating' => $player->rating,
                    'player_number' => $playerTeams->where('player_id', $player->id)->first()->player_number ?? null,
                ];
            }
        }
    }

   
    public function render()
    {
        return view('livewire.player-request-one-private');
    }
}
