<?php

namespace App\Http\Controllers;

use App\Mail\contactMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContacController extends Controller
{
    
    public function send(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'email' => 'required|email|max:50',
            'name' => 'required|string|max:50',
            'message' => 'required|string|max:800',
        ]);

        // Obtener los datos del formulario
        $email = $request->input('email');
        $name = $request->input('name');
        $messageContent = $request->input('message');

        // Enviar el correo usando el Mailable
        Mail::send(new contactMailable($email, $name, $messageContent));

        return back()->with('success', '¡Tu mensaje ha sido enviado correctamente!');
    }
}
