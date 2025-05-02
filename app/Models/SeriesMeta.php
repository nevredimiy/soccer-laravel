<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeriesMeta extends Model
{
    protected $fillable = [
        'event_id',
        'stadium_id',
        'league_id',
        'size_field',
        'date',
        'start_date',
        'end_date',
        'series',
        'round',
        'price',
        'status_registration',


    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
    public function stadium()
    {
        return $this->belongsTo(Stadium::class, 'stadium_id');
    }
   
    public function teams()
    {
        return $this->hasManyThrough(
            Team::class,
            Event::class,
            'id',         // Foreign key on the events table...
            'event_id',   // Foreign key on the teams table...
            'event_id',   // Local key on the series_metas table...
            'id'          // Local key on the events table...
        );
    }


    public function getStartDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d.m.Y H:i');
    }
    public function getEndDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d.m.Y H:i');
    }
    public function getDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d.m.Y H:i');
    }
    
}
