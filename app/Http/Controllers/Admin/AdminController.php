<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'benevole' => \App\Models\Inscription::where('type', 'benevole')->count(),
            'exposant' => \App\Models\Inscription::where('type', 'exposant')->count(),
            'artiste_ins' => \App\Models\Inscription::where('type', 'artiste')->count(),
            'presse' => \App\Models\Inscription::where('type', 'presse')->count(),
            'total_news' => \App\Models\Actualite::count(),
            'total_partners' => \App\Models\Partner::count(),
            'total_artists' => \App\Models\Artiste::count(),
        ];

        $features = \App\Models\HomeFeature::orderBy('order')->get();
        $recentInscriptions = \App\Models\Inscription::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'features', 'recentInscriptions'));
    }
}
