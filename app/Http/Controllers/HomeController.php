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
        $slides = Slide::where('active', true)->orderBy('order')->get();
        $vehicules = Vehicle::with(['images', 'category'])->where('is_available', true)->take(6)->get();

        // Récupérer les propriétés avec leurs relations
        $proprietes = Property::take(6)->get();
        $propertiesForSale = Property::where('status', 'sale')->take(6)->get();
        $propertiesForRent = Property::where('status', 'rent')->take(6)->get();

        return view('index', compact('slides', 'vehicules', 'proprietes', 'propertiesForSale', 'propertiesForRent'));
    }
}
