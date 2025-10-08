<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'is_available'
    ];

    protected $casts = [
        'price_per_day' => 'decimal:2',
        'is_available' => 'boolean',
        'year' => 'integer',
        'seats' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($vehicle) {
            $vehicle->slug = $vehicle->slug ?? Str::slug($vehicle->name);
        });
    }

    public function category()
    {
        return $this->belongsTo(VehicleCategory::class);
    }

    public function images()
    {
        return $this->hasMany(VehicleImage::class);
    }

    public function primaryImage()
    {
        return $this->hasOne(VehicleImage::class)->where('is_primary', true);
    }
}
