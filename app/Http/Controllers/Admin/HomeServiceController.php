<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HomeService;

class HomeServiceController extends Controller
{
    public function index()
    {
        $services = HomeService::orderBy('order')->get();
        return view('admin.home-services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.home-services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'required|string',
            'link' => 'nullable|string',
            'color_class' => 'required|string',
            'order' => 'required|integer',
        ]);

        HomeService::create($request->all());

        return redirect()->route('admin.home-services.index')->with('success', 'Service créé avec succès.');
    }

    public function edit(HomeService $homeService)
    {
        return view('admin.home-services.edit', compact('homeService'));
    }

    public function update(Request $request, HomeService $homeService)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'required|string',
            'link' => 'nullable|string',
            'color_class' => 'required|string',
            'order' => 'required|integer',
        ]);

        $homeService->update($request->all());

        return redirect()->route('admin.home-services.index')->with('success', 'Service mis à jour avec succès.');
    }

    public function destroy(HomeService $homeService)
    {
        $homeService->delete();
        return redirect()->route('admin.home-services.index')->with('success', 'Service supprimé avec succès.');
    }
}
