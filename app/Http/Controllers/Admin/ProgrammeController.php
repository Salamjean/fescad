<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    public function index()
    {
        $programmes = Programme::orderBy('date', 'asc')->orderBy('start_time', 'asc')->get();
        return view('admin.programme.index', compact('programmes'));
    }

    public function create()
    {
        return view('admin.programme.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
        ]);

        Programme::create($request->all());

        return redirect()->route('admin.programme.index')->with('success', 'Événement ajouté avec succès.');
    }

    public function edit($id)
    {
        $programme = Programme::findOrFail($id);
        return view('admin.programme.edit', compact('programme'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
        ]);

        $programme = Programme::findOrFail($id);
        $programme->update($request->all());

        return redirect()->route('admin.programme.index')->with('success', 'Événement mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $programme = Programme::findOrFail($id);
        $programme->delete();

        return redirect()->route('admin.programme.index')->with('success', 'Événement supprimé avec succès.');
    }
}
