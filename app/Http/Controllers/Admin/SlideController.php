<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slides.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slides.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'order' => 'required|integer',
            'active' => 'nullable|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('slides', 'public');
            $validated['image'] = $path;
        }

        // S'assurer que active est un booléen strict
        $validated['active'] = $request->has('active') && $request->input('active') == '1';

        Slide::create($validated);

        return redirect()->route('admin.slides.index')
            ->with('success', 'Slide créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slide $slide)
    {
        return view('admin.slides.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slide $slide)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'order' => 'required|integer',
            'active' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Gérer l'upload d'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($slide->image && Storage::disk('public')->exists($slide->image)) {
                Storage::disk('public')->delete($slide->image);
            }

            // Uploader la nouvelle image
            $imagePath = $request->file('image')->store('slides', 'public');
            $validated['image'] = $imagePath;
        }

        // S'assurer que active est un booléen strict
        $validated['active'] = $request->has('active') && $request->input('active') == '1';

        $slide->update($validated);

        return redirect()->route('admin.slides.index')
            ->with('success', 'Slide mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slide)
    {
        if ($slide->image) {
            Storage::disk('public')->delete($slide->image);
        }

        $slide->delete();

        return redirect()->route('admin.slides.index')
            ->with('success', 'Slide supprimé avec succès.');
    }
}
