<?php

namespace App\Listeners;

use App\Events\UserPassword;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\ForgotEmail;
use Illuminate\Support\Facades\Mail;

class SendForgotPassword
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserPassword $event)
    {
        // Access the user instance from the event
        $email = $event->email;
      
        $new_password = $event->new_password;

        Mail::to($email)->send(new ForgotEmail($email, $new_password));
    }
}
