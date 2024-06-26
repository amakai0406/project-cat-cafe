<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public array $contactInfo)
    {

    }

    /**
     * Get the message envelope.s
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->contactInfo['email'], $this->contactInfo['name']),
            subject: 'お問い合わせがありました',
        );
    }

    /**
     *  the message content definition.
     */

    //メール通知やメッセージ生成 新しいオブジェクト作成　textプロパティに'contacts.complete'
    public function content(): Content
    {
        return new Content(
            text: 'contacts.complete',
        );
    }

}
