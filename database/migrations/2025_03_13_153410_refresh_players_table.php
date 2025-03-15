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
            // Удаляем колонку полного имени
            $table->dropColumn('full_name');
            
            // Добавляем новые поля
            $table->string('last_name')->after('team_id'); // Фамилия
            $table->string('first_name')->after('last_name'); // Имя
            $table->string('phone')->nullable()->after('first_name'); // Телефон
            $table->date('birth_date')->nullable()->after('phone'); // Дата рождения
            
            // Изменяем поле `position` (амплуа)
            $table->enum('position', ['нападник', 'півзахисник', 'захисник', 'голкіпер', 'менеджер', 'тренер'])
                ->default('нападник')
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('players', function (Blueprint $table) {
            // Восстанавливаем колонку `full_name`
            $table->string('full_name')->after('team_id');
            
            // Удаляем новые поля
            $table->dropColumn(['last_name', 'first_name', 'phone', 'birth_date']);
            
            // Откатываем `position` к старому значению
            $table->enum('position', ['goalkeeper', 'defender', 'midfielder', 'forward'])
                ->default('goalkeeper')
                ->change();
        });
    }
};
