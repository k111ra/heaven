<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Slide extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'order',
        'active'
    ];

    protected $casts = [
        'active' => 'boolean',
        'order' => 'integer',
    ];

    protected $attributes = [
        'active' => 1,  // 1 pour true en base de données
        'order' => 0,
    ];

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
        return $primaryImage ? $primaryImage->url : asset('img/default-slide.jpg');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
