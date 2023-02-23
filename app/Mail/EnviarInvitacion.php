<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnviarInvitacion extends Mailable
{
    use Queueable, SerializesModels;

    protected $usuario;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    

    public function __construct(User $usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Invitación para la boda de Unai y Silvia',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {

        return new Content(
            markdown: 'vendor.mail.emails.invitacion',
            with: [
                'correo' => $this->usuario->correo,
                'password' => $this->usuario->password,
                'url' => route("login")
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
