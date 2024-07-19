<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgotEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $payment_link;
    public $new_password;
    /**
     * Create a new message instance.
     */
    public function __construct($email,  $new_password)
    {
        $this->email = $email;
        
        $this->new_password = $new_password;
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: config('app.name'). '-Forgot Password',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.forgot',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}



// <?php

// namespace App\Mail;

// use App\Models\User;
// use Illuminate\Bus\Queueable;
// use Illuminate\Mail\Mailable;
// use Illuminate\Queue\SerializesModels;

// class WelcomeEmail extends Mailable
// {
//     use Queueable, SerializesModels;

//     public $user;

//     public function __construct(User $user)
//     {
//         $this->user = $user;
//     }

//     public function build()
//     {
//         return $this->markdown('emails.welcome')
//                     ->subject('Welcome to Our Site');
//     }
// }
