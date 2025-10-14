<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        // Assurez-vous que le dossier properties existe
        if (!Storage::disk('public')->exists('properties')) {
            Storage::disk('public')->makeDirectory('properties');
        }

        // Récupérer un agent (admin) existant ou le créer
        $agent = User::where('is_admin', true)->first();

        $properties = [
            [
                'title' => 'Villa de luxe à Cocody',
                'type' => 'Villa',
                'description' => 'Magnifique villa de standing avec piscine, jardin tropical et vue panoramique. Située dans le quartier huppé de Cocody Riviera.',
                'address' => 'Cocody Riviera, Abidjan',
                'price' => 150000000,
                'status' => 'sale',
                'surface' => 500,
                'bedrooms' => 5,
                'bathrooms' => 4,
                'garage' => 2,
                'image' => 'properties/villa-cocody.jpg',
                'agent_id' => $agent->id ?? null
            ],
            [
                'title' => 'Appartement moderne à Marcory',
                'type' => 'Appartement',
                'description' => 'Appartement de 3 pièces entièrement rénové avec terrasse et vue sur la lagune. Proche des commodités.',
                'address' => 'Marcory Zone 4, Abidjan',
                'price' => 25000,
                'status' => 'rent',
                'surface' => 85,
                'bedrooms' => 2,
                'bathrooms' => 2,
                'garage' => 1,
                'image' => 'properties/appartement-marcory.jpg',
                'agent_id' => $agent->id ?? null
            ],
            [
                'title' => 'Bureau moderne à Plateau',
                'type' => 'Bureau',
                'description' => 'Espace de bureau climatisé de 200m² au cœur du district des affaires d\'Abidjan. Idéal pour entreprise.',
                'address' => 'Plateau, Abidjan',
                'price' => 180000,
                'status' => 'rent',
                'surface' => 200,
                'bedrooms' => 0,
                'bathrooms' => 2,
                'garage' => 3,
                'image' => 'properties/bureau-plateau.jpg',
                'agent_id' => $agent->id ?? null
            ],
            [
                'title' => 'Maison familiale à Yopougon',
                'type' => 'Maison',
                'description' => 'Belle maison familiale avec cour, garage et dépendance. Quartier calme et sécurisé.',
                'address' => 'Yopougon Niangon, Abidjan',
                'price' => 45000000,
                'status' => 'sale',
                'surface' => 150,
                'bedrooms' => 4,
                'bathrooms' => 3,
                'garage' => 1,
                'image' => 'properties/maison-yopougon.jpg',
                'agent_id' => $agent->id ?? null
            ],
            [
                'title' => 'Studio étudiant à Treichville',
                'type' => 'Appartement',
                'description' => 'Studio meublé parfait pour étudiant ou jeune professionnel. Proche université et transports.',
                'address' => 'Treichville, Abidjan',
                'price' => 12000,
                'status' => 'rent',
                'surface' => 25,
                'bedrooms' => 1,
                'bathrooms' => 1,
                'garage' => 0,
                'image' => 'properties/studio-treichville.jpg',
                'agent_id' => $agent->id ?? null
            ],
            [
                'title' => 'Villa avec piscine à Bassam',
                'type' => 'Villa',
                'description' => 'Superbe villa de vacances avec piscine privée, proche de la plage. Idéale pour week-ends.',
                'address' => 'Grand-Bassam',
                'price' => 80000000,
                'status' => 'sale',
                'surface' => 300,
                'bedrooms' => 4,
                'bathrooms' => 3,
                'garage' => 2,
                'image' => 'properties/villa-bassam.jpg',
                'agent_id' => $agent->id ?? null
            ],
            [
                'title' => 'Duplex standing à Angré',
                'type' => 'Appartement',
                'description' => 'Duplex de standing avec terrasse panoramique, cuisine équipée et finitions haut de gamme.',
                'address' => 'Angré 8ème tranche, Abidjan',
                'price' => 40000,
                'status' => 'rent',
                'surface' => 120,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'garage' => 1,
                'image' => 'properties/duplex-angre.jpg',
                'agent_id' => $agent->id ?? null
            ],
            [
                'title' => 'Local commercial à Adjamé',
                'type' => 'Commercial',
                'description' => 'Local commercial bien situé dans le centre commercial d\'Adjamé. Fort passage et grande visibilité.',
                'address' => 'Adjamé Marché, Abidjan',
                'price' => 35000,
                'status' => 'rent',
                'surface' => 60,
                'bedrooms' => 0,
                'bathrooms' => 1,
                'garage' => 0,
                'image' => 'properties/local-adjame.jpg',
                'agent_id' => $agent->id ?? null
            ]
        ];

        foreach ($properties as $property) {
            Property::create($property);
        }
    }
}
