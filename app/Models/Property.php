<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes; // ← décommente si tu veux la corbeille
use Illuminate\Support\Facades\Storage;

class Property extends Model
{
    use HasFactory;
    // use SoftDeletes;

    /** @var string */
    protected $table = 'proprietes';

    /**
     * Champs autorisés en écriture de masse
     */
    protected $fillable = [
        'title',
        'description',
        'address',
        'price',
        'status',
        'surface',
        'bedrooms',
        'bathrooms',
        'garage',
        'image',
        'agent_id'
    ];

    /**
     * Casts ($ CA sans décimales -> decimal:0 ; si tu veux 2 décimales: decimal:2)
     */
    protected $casts = [
        'price'     => 'decimal:0',
        'surface'   => 'integer',
        'bedrooms'  => 'integer',
        'bathrooms' => 'integer',
        'garage'    => 'integer',
        'agent_id'  => 'integer',
    ];

    /**
     * Attributs ajoutés automatiquement au JSON / arrays
     */
    protected $appends = [
        'price_formatted',
        'image_url',
    ];

    /* ===========================
     |  RELATIONS
     |===========================*/

    /**
     * Si tes agents sont des users.
     * Si tu as une table "agents", change en: belongsTo(Agent::class)
     */
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    /* ===========================
     |  ACCESSORS / ATTRIBUTES
     |===========================*/

    /**
     * $ CA joliment formaté pour l’affichage
     * $property->price_formatted → "150 000 000"
     */
    public function getPriceFormattedAttribute(): string
    {
        $value = (float) $this->price;
        return number_format($value, 0, ',', ' ');
    }

    /**
     * URL absolue de l’image (fallback si vide)
     * $property->image_url
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->image && Storage::disk('public')->exists($this->image)) {
            return asset('storage/' . $this->image);
        }
        return asset('img/property-4.jpg'); // image par défaut
    }

    /* ===========================
     |  SCOPES
     |===========================*/

    /**
     * Filtrage rapide : recherche texte + min/max prix/surface/chambres
     *
     * Property::filter([
     *   'q' => 'Cocody',
     *   'price_min' => 10000000,
     *   'price_max' => 200000000,
     *   'surface_min' => 300,
     *   'bedrooms_min' => 3,
     * ])->paginate();
     */
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['q'] ?? null, function ($q, $term) {
            $q->where(function ($qq) use ($term) {
                $qq->where('title', 'like', "%{$term}%")
                    ->orWhere('address', 'like', "%{$term}%")
                    ->orWhere('description', 'like', "%{$term}%");
            });
        });

        $query->when($filters['price_min'] ?? null, fn($q, $v) => $q->where('price', '>=', $v));
        $query->when($filters['price_max'] ?? null, fn($q, $v) => $q->where('price', '<=', $v));
        $query->when($filters['surface_min'] ?? null, fn($q, $v) => $q->where('surface', '>=', $v));
        $query->when($filters['bedrooms_min'] ?? null, fn($q, $v) => $q->where('bedrooms', '>=', $v));

        return $query;
    }
}
