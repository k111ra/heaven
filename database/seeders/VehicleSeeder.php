<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    public function run(): void
    {
        // S'assurer que les catégories existent
        $voitureCategory = VehicleCategory::where('name', 'Voiture')->first();
        $suvCategory = VehicleCategory::where('name', 'SUV')->first();
        $minibusCategory = VehicleCategory::where('name', 'Minibus')->first();

        if (!$voitureCategory || !$suvCategory || !$minibusCategory) {
            $this->command->error('Les catégories de véhicules doivent être créées en premier');
            return;
        }

        $vehicles = [
            [
                'category_id' => $voitureCategory->id,
                'name' => 'Toyota Corolla',
                'slug' => 'toyota-corolla',
                'description' => 'Berline économique et fiable, parfaite pour les déplacements en ville',
                'brand' => 'Toyota',
                'model' => 'Corolla',
                'year' => 2022,
                'transmission' => 'automatique',
                'fuel_type' => 'essence',
                'seats' => 5,
                'price_per_day' => 25000,
                'is_available' => true
            ],
            [
                'category_id' => $suvCategory->id,
                'name' => 'Range Rover Sport',
                'slug' => 'range-rover-sport',
                'description' => 'SUV de luxe avec tout le confort pour vos déplacements haut de gamme',
                'brand' => 'Land Rover',
                'model' => 'Range Rover Sport',
                'year' => 2023,
                'transmission' => 'automatique',
                'fuel_type' => 'diesel',
                'seats' => 7,
                'price_per_day' => 85000,
                'is_available' => true
            ],
            [
                'category_id' => $minibusCategory->id,
                'name' => 'Mercedes Sprinter',
                'slug' => 'mercedes-sprinter',
                'description' => 'Minibus spacieux pour transport de groupe et événements',
                'brand' => 'Mercedes-Benz',
                'model' => 'Sprinter',
                'year' => 2021,
                'transmission' => 'manuel',
                'fuel_type' => 'diesel',
                'seats' => 15,
                'price_per_day' => 45000,
                'is_available' => true
            ]
        ];

        foreach ($vehicles as $vehicle) {
            Vehicle::firstOrCreate(
                ['slug' => $vehicle['slug']],
                $vehicle
            );
        }
    }
}
