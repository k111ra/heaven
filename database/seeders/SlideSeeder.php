<?php

namespace Database\Seeders;

use App\Models\Slide;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SlideSeeder extends Seeder
{
    public function run(): void
    {
        // Assurez-vous que le dossier slides existe
        if (!Storage::disk('public')->exists('slides')) {
            Storage::disk('public')->makeDirectory('slides');
        }

        $slides = [
            [
                'title' => 'Bienvenue sur Heaven League',
                'description' => 'Découvrez nos services exceptionnels',
                'image' => 'slides/slide1.jpg',
                'order' => 1,
                'active' => true
            ],
            [
                'title' => 'Services Immobiliers',
                'description' => 'Trouvez la propriété de vos rêves',
                'image' => 'slides/slide2.jpg',
                'order' => 2,
                'active' => true
            ],
            [
                'title' => 'Location de Véhicules',
                'description' => 'Une large gamme de véhicules à votre disposition',
                'image' => 'slides/slide3.jpg',
                'order' => 3,
                'active' => true
            ]
        ];

        foreach ($slides as $slide) {
            Slide::create($slide);
        }
    }
}
