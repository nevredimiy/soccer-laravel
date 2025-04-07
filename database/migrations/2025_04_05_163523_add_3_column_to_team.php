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
        Schema::table('teams', function (Blueprint $table) {
            $table->integer('application_lifetime_days')->default(6)->after('player_request_status');
            $table->integer('application_lifetime_hours')->default(0)->after('application_lifetime_days');
            $table->integer('application_lifetime_minutes')->default(0)->after('application_lifetime_hours');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn('application_lifetime_hours');
            $table->dropColumn('application_lifetime_hours');
            $table->dropColumn('application_lifetime_minutes');
        });
    }
};
