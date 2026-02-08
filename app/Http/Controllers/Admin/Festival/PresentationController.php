<?php

namespace App\Http\Controllers\Admin\Festival;

use App\Http\Controllers\Controller;
use App\Models\FestivalPresentation;
use Illuminate\Http\Request;

class PresentationController extends Controller
{
    public function index()
    {
        $presentation = FestivalPresentation::first();
        return view('admin.festival.presentation.index', compact('presentation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'description' => 'required',
            'points_text' => 'nullable|string',
            'btn1_text' => 'nullable|string',
            'btn1_link' => 'nullable|string',
            'btn2_text' => 'nullable|string',
            'btn2_link' => 'nullable|string',
            'image' => 'nullable|image',
            'hero_background' => 'nullable|image',
        ]);

        $presentation = FestivalPresentation::findOrFail($id);
        $data = $request->only(['title', 'subtitle', 'description', 'btn1_text', 'btn1_link', 'btn2_text', 'btn2_link', 'video_link']);

        // Handle points from textarea
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

        if ($request->hasFile('hero_background')) {
            $image = $request->file('hero_background');
            $imageName = 'hero_bg_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img'), $imageName);
            $data['hero_background'] = 'assets/img/' . $imageName;
        }

        $presentation->update($data);

        return redirect()->route('admin.festival.presentation.index')->with('success', 'Présentation mise à jour avec succès.');
    }
}
