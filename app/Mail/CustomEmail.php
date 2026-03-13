<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CustomEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailSubject;
    public $emailMessage;
    public $emailAttachments; // renamed to avoid collision with Mailable::$attachments

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $message, $emailAttachments = [])
    {
        $this->emailSubject    = $subject;
        $this->emailMessage    = $message;
        $this->emailAttachments = $emailAttachments;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->emailSubject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.custom.email',
            with: [
                'emailSubject'  => $this->emailSubject,
                'emailMessage'  => $this->emailMessage,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        if (empty($this->emailAttachments) || !is_array($this->emailAttachments)) {
            return $attachments;
        }

        foreach ($this->emailAttachments as $attachment) {
            if (!is_array($attachment) || !isset($attachment['path'], $attachment['name'])) {
                continue;
            }

            if (!file_exists($attachment['path'])) {
                continue;
            }

            try {
                $obj = \Illuminate\Mail\Mailables\Attachment::fromPath($attachment['path'])
                    ->as($attachment['name']);

                if (!empty($attachment['mime'])) {
                    $obj->withMime($attachment['mime']);
                }

                $attachments[] = $obj;
            } catch (\Exception $e) {
                continue;
            }
        }

        return $attachments;
    }
}