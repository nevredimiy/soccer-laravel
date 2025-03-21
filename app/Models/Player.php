<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Player extends Model
{
    protected $fillable = [
        'user_id',
        'last_name',
        'first_name',
        'phone',
        'birth_date',
        'position'
    ];

    // Добавляем связь с пользователем
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
