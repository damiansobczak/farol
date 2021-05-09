<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Message;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'phone' => ['required', 'regex:/\+[0-9]{2}\d{9}|\d{9}/'],
            'message' => 'required|string|max:500'
        ]);

        Mail::to(config('mail.from.address'))->send(new Message($validated));

        return back()->with('message', 'Wiadomość została wysłana poprawnie!');
    }
}
