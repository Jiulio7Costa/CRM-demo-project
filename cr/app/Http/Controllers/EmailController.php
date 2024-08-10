<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

class EmailController extends Controller
{
    public function sendTestEmail()
    {
        $toEmail = 'example@example.com'; 
        $data = [
            'name' => 'John Doe',
            'message' => 'This is a test email message.'
        ];

        Mail::to($toEmail)->send(new TestEmail());

        return 'Test email sent!';
    }
}
