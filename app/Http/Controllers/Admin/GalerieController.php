<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalerieController extends Controller
{
    public function index()
    {
        $galeries = Galerie::orderBy('created_at', 'desc')->get();
        return view('admin.galeries.index', compact('galeries'));
    }

    public function create()
    {
        return view('admin.galeries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('galerie', 'public');
            $data['image_path'] = $imagePath;
        }

        Galerie::create($data);

        return redirect()->route('admin.galeries.index')->with('success', 'Image ajoutée à la galerie.');
    }

    public function edit(Galerie $galery)
    {
        return view('admin.galeries.edit', compact('galery'));
    }

    public function update(Request $request, Galerie $galery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image_path')) {
            if ($galery->image_path) {
                Storage::disk('public')->delete($galery->image_path);
            }
            $imagePath = $request->file('image_path')->store('galerie', 'public');
            $data['image_path'] = $imagePath;
        }

        $galery->update($data);

        return redirect()->route('admin.galeries.index')->with('success', 'Image mise à jour.');
    }

    public function destroy(Galerie $galery)
    {
        if ($galery->image_path) {
            Storage::disk('public')->delete($galery->image_path);
        }
        $galery->delete();

        return redirect()->route('admin.galeries.index')->with('success', 'Image supprimée.');
    }
}
