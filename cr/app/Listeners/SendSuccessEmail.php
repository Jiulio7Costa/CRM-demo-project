<?php

namespace App\Listeners;

use App\Events\Registered;
use App\Mail\SuccessMail;
use Illuminate\Support\Facades\Mail;

class SendSuccessEmail
{
    public function handle(Registered $event)
    {
        Mail::to($event->user->email)->send(new SuccessMail($event->user));
    }
}
