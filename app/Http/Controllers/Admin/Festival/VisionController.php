<?php

namespace App\Http\Controllers\Admin\Festival;

use App\Http\Controllers\Controller;
use App\Models\FestivalVision;
use Illuminate\Http\Request;

class VisionController extends Controller
{
    public function index()
    {
        $vision = FestivalVision::first();
        return view('admin.festival.vision.index', compact('vision'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vision_title' => 'required|string|max:255',
            'vision_text' => 'required',
            'vision_image' => 'nullable|image',
            'mission_title' => 'required|string|max:255',
            'mission_text' => 'required',
            'mission_image' => 'nullable|image',
            'mission_points' => 'nullable|array',
            'mission_points.*' => 'nullable|string',
        ]);

        $vision = FestivalVision::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('vision_image')) {
            $image = $request->file('vision_image');
            $imageName = time() . '_vision.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img'), $imageName);
            $data['vision_image'] = 'assets/img/' . $imageName;
        }

        if ($request->hasFile('mission_image')) {
            $image = $request->file('mission_image');
            $imageName = time() . '_mission.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img'), $imageName);
            $data['mission_image'] = 'assets/img/' . $imageName;
        }

        // Filter empty points
        $data['mission_points'] = array_filter($request->input('mission_points', []), function ($value) {
            return !is_null($value) && $value !== '';
        });

        $vision->update($data);

        return redirect()->route('admin.festival.vision.index')->with('success', 'Vision & Mission mises à jour avec succès.');
    }
}
