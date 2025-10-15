<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Illuminate\Http\Request;

class VehiclePublicController extends Controller
{
    public function index()
    {
        $categories = VehicleCategory::withCount('vehicles')->get();
        return view('services.location-vehicule.index', compact('categories'));
    }

    public function list(Request $request)
    {
        $query = Vehicle::with(['category', 'images'])->where('is_available', true);

        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        $vehicles = $query->latest()->paginate(9);
        $categories = VehicleCategory::all();

        return view('services.location-vehicule.vehicules', compact('vehicles', 'categories'));
    }

    public function show(Vehicle $vehicle)
    {
        if (!$vehicle->is_available) {
            abort(404, 'Véhicule non disponible');
        }

        $vehicle->load(['category', 'images']);

        // Véhicules similaires (même catégorie)
        $similarVehicles = Vehicle::where('id', '!=', $vehicle->id)
            ->where('category_id', $vehicle->category_id)
            ->where('is_available', true)
            ->take(3)
            ->get();

        return view('services.location-vehicule.detail-vehicule', compact('vehicle', 'similarVehicles'));
    }
}
