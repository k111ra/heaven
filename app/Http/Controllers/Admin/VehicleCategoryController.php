<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VehicleCategoryController extends Controller
{
    public function index()
    {
        // Récupération des catégories avec le comptage des véhicules
        $categories = VehicleCategory::withCount('vehicles')->paginate(9);

        // Calcul du nombre total de véhicules
        $totalVehicles = Vehicle::count();

        return view('admin.vehicules.categories.index', compact('categories', 'totalVehicles'));
    }

    public function create()
    {
        return view('admin.vehicules.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:vehicle_categories',
            'description' => 'nullable|string'
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        VehicleCategory::create($validated);

        return redirect()
            ->route('admin.vehicule-categories.index')  // Notez "vehicule-categories" au lieu de "vehicle-categories"
            ->with('success', 'Catégorie créée avec succès');
    }

    public function edit(VehicleCategory $vehicleCategory)
    {
        return view('admin.vehicules.categories.edit', compact('vehicleCategory'));
    }

    public function update(Request $request, VehicleCategory $vehicleCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:vehicle_categories,name,' . $vehicleCategory->id,
            'description' => 'nullable|string'
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $vehicleCategory->update($validated);

        return redirect()
            ->route('admin.vehicule-categories.index')  // Notez "vehicule-categories" au lieu de "vehicle-categories"
            ->with('success', 'Catégorie mise à jour avec succès');
    }

    public function destroy(VehicleCategory $vehicleCategory)
    {
        $vehicleCategory->delete();

        return redirect()
            ->route('admin.vehicule-categories.index')  // Notez "vehicule-categories" au lieu de "vehicle-categories"
            ->with('success', 'Catégorie supprimée avec succès');
    }
}
