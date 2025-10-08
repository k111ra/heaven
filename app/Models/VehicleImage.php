<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleImage extends Model
{
    protected $fillable = ['vehicle_id', 'path', 'is_primary', 'order'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
