<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class contactMailable extends Mailable
{
    use Queueable, SerializesModels;
    
    public $messageContent;
    public $email;
    public $name;

    public function __construct($email, $name, $messageContent)
    {
        $this->email = $email;
        $this->name = $name;
        $this->messageContent = $messageContent;
    }

    public function envelope()
    {
        return new Envelope(
            from: new Address($this->email, $this->name),
            subject: 'Nuevo mensaje de cliente',
        );
    }

    public function content()
    {
        return new Content(
            view: 'emails.emailMessage',
            with: [
                'messageContent' => $this->messageContent,
                'name' => $this->name,
                'email' => $this->email,
            ],
        );
    }

    public function attachments()
    {
        return [];
    }
    public function build()
    {
        return $this->to('huellitas1626@gmail.com');
    }
}
