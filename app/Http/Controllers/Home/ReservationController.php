<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function storeTicket(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'quantity' => 'required|integer|min:1',
            'message' => 'nullable|string',
        ]);

        Reservation::create([
            'type' => 'ticket',
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'quantity' => $request->quantity,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Votre demande de réservation de billet a été envoyée avec succès.');
    }

    public function storeStand(Request $request)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'representative' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'stand_type' => 'required|string',
            'products' => 'nullable|string',
        ]);

        Reservation::create([
            'type' => 'stand',
            'name' => $request->representative,
            'company' => $request->company,
            'email' => $request->email,
            'phone' => $request->phone,
            'stand_type' => $request->stand_type,
            'message' => $request->products, // Mapping products description to message
        ]);

        return redirect()->back()->with('success', 'Votre demande de réservation de stand a été envoyée avec succès.');
    }
}
