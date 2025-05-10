<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('series_players', function (Blueprint $table) {
            $table->id();
            $table->foreignId('series_meta_id')->constrained()->onDelete('cascade');
            $table->foreignId('player_id')->constrained()->onDelete('cascade');
            $table->unsignedTinyInteger('team_id');
            $table->unsignedTinyInteger('player_number');
            $table->unique(['series_meta_id', 'player_id', 'team_id']); //уникальный индекс, чтобы не было дублей по серии и игроку
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_series');
    }
};
