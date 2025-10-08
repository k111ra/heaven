<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with(['category', 'images'])->paginate(10);
        return view('admin.vehicules.index', compact('vehicles'));
    }

    public function create()
    {
        $categories = VehicleCategory::all();
        return view('admin.vehicules.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:vehicle_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'transmission' => 'required|string|in:manuel,automatique',
            'fuel_type' => 'required|string|in:essence,diesel,électrique,hybride',
            'seats' => 'required|integer|min:1|max:50',
            'price_per_day' => 'required|numeric|min:0',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'is_available' => 'boolean'
        ]);

        // Ajout du slug
        $validated['slug'] = Str::slug($validated['name']);

        // Gestion de la disponibilité
        $validated['is_available'] = $request->has('is_available');

        try {
            // Création du véhicule
            $vehicle = Vehicle::create($validated);

            // Gestion des images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    $path = $image->store('vehicles', 'public');
                    $vehicle->images()->create([
                        'path' => $path,
                        'is_primary' => $index === 0
                    ]);
                }
            }

            return redirect()
                ->route('admin.vehicules.index')
                ->with('success', 'Véhicule créé avec succès');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de la création du véhicule');
        }
    }

    public function edit(Vehicle $vehicle)
    {
        $categories = VehicleCategory::all();
        return view('admin.vehicules.edit', compact('vehicle', 'categories'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'category_id' => 'required|exists:vehicle_categories,id',
            'transmission' => 'required|in:manuel,automatique',
            'fuel_type' => 'required|in:essence,diesel,électrique,hybride',
            'seats' => 'required|integer|min:1|max:50',
            'price_per_day' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_available' => 'boolean'
        ]);

        // Gérer l'upload d'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($vehicle->image && Storage::disk('public')->exists($vehicle->image)) {
                Storage::disk('public')->delete($vehicle->image);
            }

            // Uploader la nouvelle image
            $imagePath = $request->file('image')->store('vehicles', 'public');
            $validated['image'] = $imagePath;
        }

        // Convertir le checkbox en boolean
        $validated['is_available'] = $request->has('is_available') ? true : false;

        $vehicle->update($validated);

        return redirect()->route('admin.vehicules.index')
            ->with('success', 'Véhicule mis à jour avec succès.');
    }

    public function destroy(Vehicle $vehicle)
    {
        if ($vehicle->image) {
            Storage::disk('public')->delete($vehicle->image);
        }

        $vehicle->delete();

        return redirect()
            ->route('admin.vehicules.index')
            ->with('success', 'Véhicule supprimé avec succès');
    }
}
