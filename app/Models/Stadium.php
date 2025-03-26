<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    protected $fillable = [
        'name',
        'address',
        'photo',
        'phone',
        'fields_40x20',
        'fields_60x40',
        'parking_spots',
        'has_shower',
        'has_speaker_system',
        'has_wardrobe',
        'has_toilet'
    ];

    public function setPhotoAttribute($value)
    {
        $this->attributes['photo'] = $value ?: '/img/stadium/stadium_placeholder.png';
    }

}
