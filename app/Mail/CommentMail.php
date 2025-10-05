<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use App\Models\Comment;
use Illuminate\Queue\SerializesModels;

class Commentmail extends Mailable{
    use Queueable, SerializesModels;

    public function __construct(Comment $comment, int $article_id) {

    }

    public function envelope(): Envelope {
        return new Envelope(
            from: new Address(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')),
            subject: 'CommentMail',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.comment',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}