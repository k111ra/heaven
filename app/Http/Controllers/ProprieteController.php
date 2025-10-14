<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class ProprieteController extends Controller
{
    /**
     * Affiche la liste des propriétés (page publique)
     */
    public function index(Request $request)
    {
        $filters = $request->only(['q', 'price_min', 'price_max', 'surface_min', 'bedrooms_min', 'status', 'type']);

        $proprietes = Property::filter($filters)
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('services.immobilier.proprietes', compact('proprietes', 'filters'));
    }

    /**
     * Affiche le détail d'une propriété
     */
    public function show(Property $property)
    {
        $property->load('agent');

        // Propriétés similaires (même quartier ou même gamme de prix)
        $similarProperties = Property::where('id', '!=', $property->id)
            ->where(function ($query) use ($property) {
                $query->where('address', 'like', '%' . explode(',', $property->address)[0] . '%')
                    ->orWhereBetween('price', [
                        $property->price * 0.8,
                        $property->price * 1.2
                    ]);
            })
            ->take(3)
            ->get();

        return view('services.immobilier.detail-propriete', compact('property', 'similarProperties'));
    }

    /**
     * Affiche les types de propriétés avec compteurs réels
     */
    public function types()
    {
        $propertyTypes = [
            'Appartement' => Property::where('type', 'Appartement')->count(),
            'Villa' => Property::where('type', 'Villa')->count(),
            'Maison' => Property::where('type', 'Maison')->count(),
            'Bureau' => Property::where('type', 'Bureau')->count(),
            'Immeuble' => Property::where('type', 'Immeuble')->count(),
            'Commercial' => Property::where('type', 'Commercial')->count(),
            'Terrain' => Property::where('type', 'Terrain')->count(),
            'Entrepot' => Property::where('type', 'Entrepot')->count(),
        ];

        return view('services.immobilier.index', compact('propertyTypes'));
    }

    /**
     * Recherche de propriétés avec support du type
     */
    public function search(Request $request)
    {
        $query = Property::query();

        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->q . '%')
                    ->orWhere('address', 'like', '%' . $request->q . '%')
                    ->orWhere('description', 'like', '%' . $request->q . '%')
                    ->orWhere('type', 'like', '%' . $request->q . '%');
            });
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }

        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }

        if ($request->filled('bedrooms_min')) {
            $query->where('bedrooms', '>=', $request->bedrooms_min);
        }

        if ($request->filled('surface_min')) {
            $query->where('surface', '>=', $request->surface_min);
        }

        $proprietes = $query->latest()->paginate(12);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('services.immobilier.partials.property-list', compact('proprietes'))->render(),
                'pagination' => $proprietes->render()
            ]);
        }

        return view('services.immobilier.proprietes', compact('proprietes'));
    }

    /**
     * Formulaire de contact pour une propriété
     */
    public function contact(Request $request, Property $property)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        // Ici vous pouvez envoyer un email à l'agent ou sauvegarder en BDD
        // Mail::to($property->agent->email ?? 'admin@example.com')
        //     ->send(new PropertyInquiry($property, $request->all()));

        return back()->with('success', 'Votre message a été envoyé avec succès. L\'agent vous contactera bientôt.');
    }
}
