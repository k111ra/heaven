<?php

namespace App\Http\Controllers;

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

        return view('index', compact('slides', 'vehicules'));
    }
}
