<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class VehicleCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'icon',
        'slug'
    ];

    /**
     * Relation avec les véhicules
     */
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'category_id');
    }

    /**
     * Génération automatique du slug
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    /**
     * Catégories par défaut
     */
    public static function getDefaultCategories()
    {
        return [
            'Voiture' => 'Véhicules de tourisme standard',
            'SUV' => 'Véhicules utilitaires sport',
            'Minibus' => 'Transport de groupe',
            'Camion' => 'Transport de marchandises',
            'Moto' => 'Deux roues',
            'Scooter' => 'Deux roues léger'
        ];
    }
}
