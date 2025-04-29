<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeriesMeta extends Model
{
    protected $fillable = [
        'event_id',
        'date',
        'series',
        'price',
        'round',
        'status_registration'

    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
}
