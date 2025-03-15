<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Team extends Model
{
   protected $fillable = [
      'owner_id',
      'name',
      'logo'
   ];

   public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
