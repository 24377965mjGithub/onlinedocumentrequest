<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RequestSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

     public $student;
     public $document;
     public $departmentlevel;
     public $phonenumber;
     public $schoolyeargraduated;
     public $remarks;

    public function __construct($student, $document, $departmentlevel, $phonenumber, $schoolyeargraduated, $remarks)
    {
        $this->student = $student;
        $this->document = $document;
        $this->departmentlevel = $departmentlevel;
        $this->phonenumber = $phonenumber;
        $this->schoolyeargraduated = $schoolyeargraduated;
        $this->remarks = $remarks;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Someone Submitted A Document',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.request-submitted',
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
