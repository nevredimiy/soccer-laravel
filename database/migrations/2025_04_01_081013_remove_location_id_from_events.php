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
        Schema::table('events', function (Blueprint $table) {
            // Удаляем внешний ключ (если он существует)
            $table->dropForeign(['location_id']); 
            // Удаляем сам столбец
            $table->dropColumn('location_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
           // Добавляем колонку обратно
           $table->foreignId('location_id')->nullable()->constrained()->cascadeOnDelete();
        });
    }
};
