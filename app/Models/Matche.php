<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matche extends Model
{
    protected $fillable = [
        'event_id',
        'team1_id',
        'team2_id',
        'start_time',
        'score_team1',
        'score_team2',
        'status'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
    
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'player_teams', 'player_id', 'team_id')
                    ->withTimestamps();
    }

    public function players()
    {
        return $this->belongsToMany(Player::class, 'player_teams', 'team_id', 'player_id')
                    ->withTimestamps();
    }

    
}
