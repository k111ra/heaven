<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'brand',
        'model',
        'year',
        'transmission',
        'fuel_type',
        'seats',
        'price_per_day',
        'image',
        'is_available'
    ];

    protected $casts = [
        'price_per_day' => 'decimal:2',
        'is_available' => 'boolean',
        'year' => 'integer',
        'seats' => 'integer'
    ];

    // Relations
    public function category()
    {
        return $this->belongsTo(VehicleCategory::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(VehicleImage::class);
    }

    // Accesseurs
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Automatically generate slug when creating
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($vehicle) {
            if (empty($vehicle->slug)) {
                $vehicle->slug = Str::slug($vehicle->name);
            }
        });

        static::updating(function ($vehicle) {
            if ($vehicle->isDirty('name') && empty($vehicle->slug)) {
                $vehicle->slug = Str::slug($vehicle->name);
            }
        });
    }
}
