<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeriesMeta extends Model
{
    protected $fillable = [
        'date',
        'series_number',
        'price'

    ];
}
