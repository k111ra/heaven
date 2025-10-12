<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleImage extends Model
{
    use HasFactory;

    protected $table = 'vehicle_images';

    protected $fillable = [
        'vehicle_id',
        'path',
        'is_primary',
        'order',
        'alt_text'
    ];

    protected $casts = [
        'is_primary' => 'boolean',
        'order' => 'integer'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
