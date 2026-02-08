<?php

namespace App\Http\Controllers\Admin\Festival;

use App\Http\Controllers\Controller;
use App\Models\CommissaireMessage;
use Illuminate\Http\Request;

class CommissaireController extends Controller
{
    public function index()
    {
        $commissaire = CommissaireMessage::first();
        return view('admin.festival.commissaire.index', compact('commissaire'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required',
            'image' => 'nullable|image',
            'signature_image' => 'nullable|image',
        ]);

        $commissaire = CommissaireMessage::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_commissaire.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img/team'), $imageName);
            $data['image'] = 'assets/img/team/' . $imageName;
        }

        if ($request->hasFile('signature_image')) {
            $image = $request->file('signature_image');
            $imageName = time() . '_signature.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img'), $imageName);
            $data['signature_image'] = 'assets/img/' . $imageName;
        }

        $commissaire->update($data);

        return redirect()->route('admin.festival.commissaire.index')->with('success', 'Message du Commissaire mis à jour avec succès.');
    }
}
