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
        Schema::table('vehicle_categories', function (Blueprint $table) {
            // Ajouter la colonne icon seulement si elle n'existe pas
            if (!Schema::hasColumn('vehicle_categories', 'icon')) {
                $table->string('icon')->nullable()->after('description');
            }

            // Ajouter la colonne slug seulement si elle n'existe pas
            if (!Schema::hasColumn('vehicle_categories', 'slug')) {
                $table->string('slug')->nullable()->after('name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicle_categories', function (Blueprint $table) {
            if (Schema::hasColumn('vehicle_categories', 'icon')) {
                $table->dropColumn('icon');
            }

            if (Schema::hasColumn('vehicle_categories', 'slug')) {
                $table->dropColumn('slug');
            }
        });
    }
};
