<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tournament extends Model
{
    protected $fillable = ['name', 'type', 'subtype'];

    public function events()
    {
        return $this->hasMany(Event::class, 'tournament_id');
    }
}
