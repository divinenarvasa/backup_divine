<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Extract the validated message
        $message = $validatedData['message'];

        // Email recipient address from configuration
        $toEmail = config('mail.to.address', 'divinenarvasa20@gmail.com');

        // Send email using Laravel Mail facade
        Mail::raw($message, function($message) use ($toEmail) {
            $message->to($toEmail)
                    ->subject('New Message from Chatbox');
        });

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Message sent successfully!');

        dd(session()->all());
    }
}
