<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Communique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommuniqueController extends Controller
{
    public function index()
    {
        $communiques = Communique::orderBy('published_at', 'desc')->get();
        return view('admin.communiques.index', compact('communiques'));
    }

    public function create()
    {
        return view('admin.communiques.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file_path' => 'required|file|mimes:pdf,doc,docx|max:10240', // Max 10MB
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();

        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('communiques', 'public');
            $data['file_path'] = $filePath;
        }

        Communique::create($data);

        return redirect()->route('admin.communiques.index')->with('success', 'Communiqué ajouté avec succès.');
    }

    public function edit(Communique $communique)
    {
        return view('admin.communiques.edit', compact('communique'));
    }

    public function update(Request $request, Communique $communique)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();

        if ($request->hasFile('file_path')) {
            if ($communique->file_path) {
                Storage::disk('public')->delete($communique->file_path);
            }
            $filePath = $request->file('file_path')->store('communiques', 'public');
            $data['file_path'] = $filePath;
        }

        $communique->update($data);

        return redirect()->route('admin.communiques.index')->with('success', 'Communiqué mis à jour avec succès.');
    }

    public function destroy(Communique $communique)
    {
        if ($communique->file_path) {
            Storage::disk('public')->delete($communique->file_path);
        }
        $communique->delete();

        return redirect()->route('admin.communiques.index')->with('success', 'Communiqué supprimé avec succès.');
    }
}
