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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tournament_id')->constrained('tournaments')->onDelete('cascade');
            $table->foreignId('team_home_id')->constrained('teams')->onDelete('cascade');
            $table->foreignId('team_away_id')->constrained('teams')->onDelete('cascade');
            $table->dateTime('match_date');
            $table->integer('score_home')->default(0);
            $table->integer('score_away')->default(0);
            $table->enum('status', ['scheduled', 'ongoing', 'finished'])->default('scheduled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
