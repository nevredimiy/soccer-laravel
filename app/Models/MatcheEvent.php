<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatcheEvent extends Model
{
    protected $fillable = [
        'match_id',
        'team_id',
        'player_id',
        'type',
        'minute',
        'assister_id',
        'comment'
    ];
}
