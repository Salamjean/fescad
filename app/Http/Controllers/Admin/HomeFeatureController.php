<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HomeFeature;

class HomeFeatureController extends Controller
{
    public function index()
    {
        $features = HomeFeature::orderBy('order')->get();
        return view('admin.home-features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.home-features.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'points_text' => 'nullable|string',
            'btn_text' => 'nullable|string',
            'btn_link' => 'nullable|string',
            'order' => 'required|integer',
            'is_reversed' => 'boolean',
        ]);

        $data = $request->except(['image', 'points_text']);
        $data['is_reversed'] = $request->has('is_reversed');

        if ($request->filled('points_text')) {
            $data['points'] = array_filter(array_map('trim', explode("\n", $request->points_text)));
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img'), $imageName);
            $data['image'] = 'assets/img/' . $imageName;
        }

        HomeFeature::create($data);

        return redirect()->route('admin.home-features.index')->with('success', 'Élément créé avec succès.');
    }

    public function edit(HomeFeature $homeFeature)
    {
        return view('admin.home-features.edit', compact('homeFeature'));
    }

    public function update(Request $request, HomeFeature $homeFeature)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'points_text' => 'nullable|string',
            'btn_text' => 'nullable|string',
            'btn_link' => 'nullable|string',
            'order' => 'required|integer',
            'is_reversed' => 'boolean',
        ]);

        $data = $request->except(['image', 'points_text']);
        $data['is_reversed'] = $request->has('is_reversed');

        if ($request->filled('points_text')) {
            $data['points'] = array_filter(array_map('trim', explode("\n", $request->points_text)));
        } else {
            $data['points'] = [];
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img'), $imageName);
            $data['image'] = 'assets/img/' . $imageName;
        }

        $homeFeature->update($data);

        return redirect()->route('admin.home-features.index')->with('success', 'Élément mis à jour avec succès.');
    }

    public function destroy(HomeFeature $homeFeature)
    {
        $homeFeature->delete();
        return redirect()->route('admin.home-features.index')->with('success', 'Élément supprimé avec succès.');
    }
}
