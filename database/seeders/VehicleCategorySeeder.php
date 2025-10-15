<?php

namespace Database\Seeders;

use App\Models\VehicleCategory;
use Illuminate\Database\Seeder;

class VehicleCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Voiture',
                'description' => 'Véhicules de tourisme standard pour 2-5 personnes'
            ],
            [
                'name' => 'SUV',
                'description' => 'Véhicules utilitaires sport spacieux et confortables'
            ],
            [
                'name' => 'Minibus',
                'description' => 'Transport de groupe jusqu\'à 15 personnes'
            ],
            [
                'name' => 'Camion',
                'description' => 'Transport de marchandises et déménagement'
            ],
            [
                'name' => 'Moto',
                'description' => 'Deux roues pour déplacements rapides'
            ],
            [
                'name' => 'Scooter',
                'description' => 'Deux roues léger pour la ville'
            ]
        ];

        foreach ($categories as $category) {
            VehicleCategory::firstOrCreate(
                ['name' => $category['name']],
                $category
            );
        }
    }
}
