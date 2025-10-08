<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    public function run(): void
    {
        // Création des catégories
        $suv = VehicleCategory::create([
            'name' => 'SUV',
            'description' => 'Sport Utility Vehicle',
        ]);

        $berline = VehicleCategory::create([
            'name' => 'Berline',
            'description' => 'Voiture familiale',
        ]);

        // Création des véhicules
        Vehicle::create([
            'category_id' => $suv->id,
            'name' => 'Range Rover Sport',
            'description' => 'SUV luxueux avec tout le confort nécessaire',
            'brand' => 'Land Rover',
            'model' => 'Range Rover Sport',
            'year' => 2023,
            'transmission' => 'Automatique',
            'fuel_type' => 'Diesel',
            'seats' => 5,
            'price_per_day' => 150000,
            'is_available' => true
        ]);

        Vehicle::create([
            'category_id' => $berline->id,
            'name' => 'Mercedes Classe E',
            'description' => 'Berline haut de gamme idéale pour les voyages d\'affaires',
            'brand' => 'Mercedes-Benz',
            'model' => 'Classe E',
            'year' => 2023,
            'transmission' => 'Automatique',
            'fuel_type' => 'Essence',
            'seats' => 5,
            'price_per_day' => 120000,
            'is_available' => true
        ]);
    }
}
