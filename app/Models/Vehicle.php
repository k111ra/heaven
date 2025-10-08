<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Str;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'brand',
        'model',
        'year',
        'category_id',
        'transmission',
        'fuel_type',
        'seats',
        'price_per_day',
        'description',
        'is_available'
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'price_per_day' => 'decimal:2',
        'year' => 'integer',
        'seats' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($vehicle) {
            $vehicle->slug = $vehicle->slug ?? Str::slug($vehicle->name);
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(VehicleCategory::class, 'category_id');
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable')->orderBy('order');
    }

    public function primaryImage(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable')->where('is_primary', true);
    }

    public function getImageUrlAttribute(): string
    {
        $primaryImage = $this->primaryImage;
        return $primaryImage ? $primaryImage->url : asset('img/property-4.jpg');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
