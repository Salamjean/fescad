<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artiste;
use Illuminate\Http\Request;

class ArtisteController extends Controller
{
    public function index()
    {
        $artistes = Artiste::all();
        return view('admin.artistes.index', compact('artistes'));
    }

    public function create()
    {
        return view('admin.artistes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'nullable|image',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img/team'), $imageName);
            $data['image'] = 'assets/img/team/' . $imageName;
        }

        Artiste::create($data);

        return redirect()->route('admin.artistes.index')->with('success', 'Artiste ajouté avec succès.');
    }

    public function edit($id)
    {
        $artiste = Artiste::findOrFail($id);
        return view('admin.artistes.edit', compact('artiste'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'nullable|image',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
        ]);

        $artiste = Artiste::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img/team'), $imageName);
            $data['image'] = 'assets/img/team/' . $imageName;
        }

        $artiste->update($data);

        return redirect()->route('admin.artistes.index')->with('success', 'Artiste mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $artiste = Artiste::findOrFail($id);
        $artiste->delete();

        return redirect()->route('admin.artistes.index')->with('success', 'Artiste supprimé avec succès.');
    }
}
