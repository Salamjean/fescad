<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function index()
    {
        $inscriptions = Inscription::latest()->paginate(10);
        return view('admin.inscriptions.index', compact('inscriptions'));
    }

    public function show(Inscription $inscription)
    {
        return view('admin.inscriptions.show', compact('inscription'));
    }
}
