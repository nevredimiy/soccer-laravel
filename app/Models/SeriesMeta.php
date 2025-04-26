<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
