<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address; // 1. Importamos Address para el remitente
use App\Models\Videojuego; // 2. Importamos el modelo

class VideojuegoCreateMail extends Mailable
{
    use Queueable, SerializesModels;

    // 3. Declaramos la propiedad pública para usarla en la vista
    public $videojuego;

    public function __construct(Videojuego $videojuego)
    {
        // Asignamos el juego que nos llegue desde el controlador
        $this->videojuego = $videojuego;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            // 4. Personalizamos remitente y asunto (usando datos del objeto)
            from: new Address('notificaciones@tujuego.com', 'Sistema de Juegos'),
            subject: 'Nuevo ingreso al catálogo: ' . $this->videojuego->titulo,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.videojuego_create',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}