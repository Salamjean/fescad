<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ActualiteController extends Controller
{
    public function index()
    {
        $actualites = Actualite::orderBy('published_at', 'desc')->get();
        return view('admin.actualites.index', compact('actualites'));
    }

    public function create()
    {
        return view('admin.actualites.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('actualites', 'public');
            $data['image'] = $imagePath;
        }

        Actualite::create($data);

        return redirect()->route('admin.actualites.index')->with('success', 'Actualité créée avec succès.');
    }

    public function edit(Actualite $actualite)
    {
        return view('admin.actualites.edit', compact('actualite'));
    }

    public function update(Request $request, Actualite $actualite)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($actualite->image) {
                Storage::disk('public')->delete($actualite->image);
            }
            $imagePath = $request->file('image')->store('actualites', 'public');
            $data['image'] = $imagePath;
        }

        $actualite->update($data);

        return redirect()->route('admin.actualites.index')->with('success', 'Actualité mise à jour avec succès.');
    }

    public function destroy(Actualite $actualite)
    {
        if ($actualite->image) {
            Storage::disk('public')->delete($actualite->image);
        }
        $actualite->delete();

        return redirect()->route('admin.actualites.index')->with('success', 'Actualité supprimée avec succès.');
    }
}
