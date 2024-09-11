<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact.email');
    }

    public function submitForm(Request $request)
    {
        // Valideer de gegevens
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Verstuur de e-mail met de ContactMail Mailable klasse

        Mail::send('contact.email', $data, function ($message) use ($data) {
            $message->to('D294512@edu.curio.nl')
                ->subject('success', 'Bedankt voor je bericht! Ik neem spoedig contact met je op. Mvg, Kelvin Aarssen.');
        });

    }
}

