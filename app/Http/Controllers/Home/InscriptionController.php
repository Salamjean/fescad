<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Inscription;

class InscriptionController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validate common fields
        $request->validate([
            'type' => 'required|string|in:benevole,exposant,artiste,presse',
            'name' => 'required|string|max:255', // Corresponds to name/company/stage_name/media_name
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        // 2. Extract specific details based on type
        // We will store everything NOT in the main columns into 'details'
        $mainColumns = ['_token', 'type', 'name', 'email', 'phone'];
        $details = $request->except($mainColumns);

        // 3. Create Inscription
        try {
            Inscription::create([
                'type' => $request->type,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'details' => $details,
                'status' => 'pending',
            ]);

            return redirect()->back()->with('success', 'Votre demande d\'inscription a bien été enregistrée. Nous vous contacterons bientôt.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'inscription. Veuillez réessayer.')->withInput();
        }
    }
}
