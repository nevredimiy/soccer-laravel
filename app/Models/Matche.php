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
    
    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }
}
