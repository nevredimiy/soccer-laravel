<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Player extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'last_name',
        'first_name',
        'phone',
        'tg',
        'birth_date',
        'photo',
        'rating',

    ];

    // Добавляем связь с пользователем
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function setPhotoAttribute($value)
    {
        $this->attributes['photo'] = $plavalue ?: '/img/avatars/default_avatar.jpg';
    }


    public function playerTeams()
    {
        return $this->hasMany(\App\Models\PlayerTeam::class)->withTimestamps();;
    }


    public function teams()
    {
        return $this->belongsToMany(\App\Models\Team::class, 'player_teams')
        ->withPivot('status')
        ->withPivot('player_number')
            ->withTimestamps();
    }


    protected $casts = [
        'birth_date' => 'date',
    ];


}
