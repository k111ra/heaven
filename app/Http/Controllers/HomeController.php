<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Slide;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Maintenant que is_active existe, on peut l'utiliser
        $slides = Slide::where('is_active', true)->orderBy('order')->get();

        // Propriétés pour l'accueil
        $proprietes = Property::latest()->take(6)->get();
        $propertiesForSale = Property::where('status', 'sale')->latest()->take(6)->get();
        $propertiesForRent = Property::where('status', 'rent')->latest()->take(6)->get();

        // Véhicules pour l'accueil avec leurs catégories
        $vehicules = Vehicle::with('category')->where('is_available', true)->latest()->take(6)->get();

        return view('index', compact('slides', 'proprietes', 'propertiesForSale', 'propertiesForRent', 'vehicules'));
    }
}
