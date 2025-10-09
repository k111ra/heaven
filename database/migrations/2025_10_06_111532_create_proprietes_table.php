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
        Schema::create('proprietes', function (Blueprint $table) {
            $table->id();
            $table->string('title');                         // Ex: "Villa de luxe à Cocody"
            $table->text('description')->nullable();          // Description détaillée
            $table->string('address')->nullable();            // Ex: "Cocody Riviera, Abidjan"
            $table->decimal('price', 15, 0)->default(0);      // 150,000,000 $ CA
            $table->enum('status', ['sale', 'rent'])->default('sale'); // Statut de la propriété
            $table->integer('surface')->nullable();           // 500 m²
            $table->integer('bedrooms')->nullable();          // 5 chambres
            $table->integer('bathrooms')->nullable();         // 4 salles de bain
            $table->integer('garage')->nullable();            // 2 places
            $table->string('image')->nullable();              // Image principale
            $table->foreignId('agent_id')->nullable()
                ->constrained('users')                      // suppose que les agents sont dans users
                ->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proprietes');
    }
};
