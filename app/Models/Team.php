<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\TeamColor;

class Team extends Model
{
   protected $fillable = [
      'owner_id',
      'name',
      'logo',
      'color_id',
      'event_id',
      'promo_code_id',
      'status'
   ];

   public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(TeamColor::class, 'color_id');
    }



}
