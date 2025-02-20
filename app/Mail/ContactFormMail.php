<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    // Datos del formulario
    public $full_name;
    public $email;
    public $subject;
    public $user_message; // Cambié $message para evitar conflicto

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
        $this->user_message = $message; // Se renombró aquí
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nuevo mensaje de contacto') // Asunto del correo
                    ->view('emails.contact_form'); // Vista del correo
    }
}
