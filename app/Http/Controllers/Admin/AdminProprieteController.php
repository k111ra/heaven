<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;              // <-- Modèle
use Illuminate\Support\Facades\Storage;

class AdminProprieteController extends Controller
{
    /**
     * Liste paginée des propriétés (vue admin.immobiliers.index)
     */
    public function index()
    {
        $proprietes = Property::latest()->paginate(12);

        return view('admin.proprietes.index', compact('proprietes'));
    }

    /**
     * Création (depuis le modal "Ajouter")
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'type'        => ['nullable', 'string', 'in:' . implode(',', array_keys(Property::getTypes()))],
            'price'       => ['required', 'numeric', 'min:0'],
            'address'     => ['nullable', 'string', 'max:255'],
            'surface'     => ['nullable', 'integer', 'min:0'],
            'bedrooms'    => ['nullable', 'integer', 'min:0'],
            'bathrooms'   => ['nullable', 'integer', 'min:0'],
            'garage'      => ['nullable', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
            'agent_id'    => ['nullable', 'integer', 'exists:users,id'], // si tu utilises 'agents' : exists:agents,id
            'image'       => ['nullable', 'image', 'max:4096'], // 4MB
        ]);

        // Upload image si fournie
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('properties', 'public'); // storage/app/public/properties/...
        }

        Property::create($data);

        return back()->with('success', 'Propriété créée avec succès.');
    }

    /**
     * Mise à jour (depuis le modal "Modifier")
     */
    public function update(Request $request, Property $propriete)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'type'        => ['nullable', 'string', 'in:' . implode(',', array_keys(Property::getTypes()))],
            'price'       => ['required', 'numeric', 'min:0'],
            'address'     => ['nullable', 'string', 'max:255'],
            'surface'     => ['nullable', 'integer', 'min:0'],
            'bedrooms'    => ['nullable', 'integer', 'min:0'],
            'bathrooms'   => ['nullable', 'integer', 'min:0'],
            'garage'      => ['nullable', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
            'agent_id'    => ['nullable', 'integer', 'exists:users,id'], // ou agents
            'image'       => ['nullable', 'image', 'max:4096'],
        ]);

        // Si une nouvelle image est envoyée, supprimer l’ancienne et enregistrer la nouvelle
        if ($request->hasFile('image')) {
            if (!empty($propriete->image) && Storage::disk('public')->exists($propriete->image)) {
                Storage::disk('public')->delete($propriete->image);
            }
            $data['image'] = $request->file('image')
                ->store('properties', 'public');
        }

        $propriete->update($data);

        return redirect()->route('admin.proprietes.index')
            ->with('success', 'Propriété mise à jour avec succès.');
    }

    /**
     * Suppression
     */
    public function destroy(Property $propriete)
    {
        if (!empty($propriete->image) && Storage::disk('public')->exists($propriete->image)) {
            Storage::disk('public')->delete($propriete->image);
        }

        $propriete->delete();

        return back()->with('success', 'Propriété supprimée avec succès.');
    }
}
