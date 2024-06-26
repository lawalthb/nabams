<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $payment_link;
    public $password;
    /**
     * Create a new message instance.
     */
    public function __construct(User $user,  $payment_link, $password)
    {
        $this->user = $user;
        $this->payment_link = $payment_link;
        $this->password = $password;
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: config('app.name'). '-Welcome Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.welcome',
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
