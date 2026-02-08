<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarifs = Tarif::all();
        return view('admin.tarifs.index', compact('tarifs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tarifs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'features' => 'nullable|string', // Expecting text from textarea
            'recommended' => 'boolean',
        ]);

        $data = $request->all();
        // Convert newline separated features to array
        if ($request->features) {
            $data['features'] = array_filter(array_map('trim', explode("\n", $request->features)));
        } else {
            $data['features'] = [];
        }

        $data['recommended'] = $request->has('recommended');

        Tarif::create($data);

        return redirect()->route('admin.tarifs.index')->with('success', 'Tarif ajouté avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarif $tarif)
    {
        return view('admin.tarifs.edit', compact('tarif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarif $tarif)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'features' => 'nullable|string',
            'recommended' => 'boolean',
        ]);

        $data = $request->all();
        // Convert newline separated features to array
        if ($request->features) {
            $data['features'] = array_filter(array_map('trim', explode("\n", $request->features)));
        } else {
            $data['features'] = [];
        }

        $data['recommended'] = $request->has('recommended');

        $tarif->update($data);

        return redirect()->route('admin.tarifs.index')->with('success', 'Tarif mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarif $tarif)
    {
        $tarif->delete();
        return redirect()->route('admin.tarifs.index')->with('success', 'Tarif supprimé avec succès.');
    }
}
