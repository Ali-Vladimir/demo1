<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $full_name;
    public $email;
    public $subject;
    public $user_message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($full_name, $email, $subject, $message)
    {
        $this->full_name = $full_name;
        $this->email = $email;
        $this->subject = $subject;
        $this->user_message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nuevo mensaje de contacto')
                    ->view('emails.contact_form');
    }
}
