<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Player extends Model
{
    protected $fillable = [
        'user_id',
        'team_id',
        'last_name',
        'first_name',
        'phone',
        'birth_date',
        'photo',
        'rating'
    ];

    // Добавляем связь с пользователем
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setPhotoAttribute($value)
    {
        $this->attributes['photo'] = $value ?: '/img/avatars/default_avatar.jpg';
    }


}
