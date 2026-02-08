<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Setting;

class ContactController extends Controller
{
    public function index()
    {
        return view('home.contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $recipient = Setting::where('key', 'contact_email')->value('value') ?? 'contact@fescad.ci';

        // For now, we'll just simulate sending an email or use a simple raw mail
        // In a real app, create a Mailable class: php artisan make:mail ContactForm
        try {
            Mail::raw("De: {$request->name} <{$request->email}>\n\nMessage:\n{$request->message}", function ($message) use ($request, $recipient) {
                $message->to($recipient)
                    ->subject("Contact FESCAD: " . $request->subject)
                    ->replyTo($request->email, $request->name);
            });

            return redirect()->back()->with('success', 'Votre message a été envoyé avec succès. Merci de nous avoir contactés !');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer.')->withInput();
        }
    }
}
