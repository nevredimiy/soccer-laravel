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
        Schema::table('players', function (Blueprint $table) {
            $table->dropColumn('position'); // Удаляем position
        });

        Schema::table('players', function (Blueprint $table) {
            $table->tinyInteger('rating')->nullable()->after('photo'); // Добавляем rating
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('players', function (Blueprint $table) {
            $table->dropColumn('rating'); // Удаляем rating
        });

        Schema::table('players', function (Blueprint $table) {
            $table->enum('position', ['нападник', 'півзахисник', 'захисник', 'голкіпер', 'менеджер', 'тренер'])
                ->default('нападник')
                ->after('photo'); 
        });
    }
};
