<?php

namespace App\Http\Controllers\Admin\Festival;

use App\Http\Controllers\Controller;
use App\Models\FestivalHistorique;
use Illuminate\Http\Request;

class HistoriqueController extends Controller
{
    public function index()
    {
        $historiques = FestivalHistorique::orderBy('year', 'asc')->get();
        return view('admin.festival.historique.index', compact('historiques'));
    }

    public function create()
    {
        return view('admin.festival.historique.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img/history'), $imageName);
            $data['image'] = 'assets/img/history/' . $imageName;
        }

        FestivalHistorique::create($data);

        return redirect()->route('admin.festival.historique.index')->with('success', 'Élément d\'historique ajouté avec succès.');
    }

    public function edit($id)
    {
        $historique = FestivalHistorique::findOrFail($id);
        return view('admin.festival.historique.edit', compact('historique'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'year' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        $historique = FestivalHistorique::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img/history'), $imageName);
            $data['image'] = 'assets/img/history/' . $imageName;
        }

        $historique->update($data);

        return redirect()->route('admin.festival.historique.index')->with('success', 'Élément d\'historique mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $historique = FestivalHistorique::findOrFail($id);
        $historique->delete();

        return redirect()->route('admin.festival.historique.index')->with('success', 'Élément d\'historique supprimé avec succès.');
    }
}
