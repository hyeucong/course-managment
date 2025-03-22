<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ClassworkCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $courseId;
    public $classworkId;
    public $classworkTitle;
    public $courseName;

    /**
     * Create a new message instance.
     */
    public function __construct($email, $courseId, $classworkId, $classworkTitle, $courseName)
    {
        $this->email = $email;
        $this->courseId = $courseId;
        $this->classworkId = $classworkId;
        $this->classworkTitle = $classworkTitle;
        $this->courseName = $courseName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('noreply@lecturespace.com', 'Lecture Space'),
            subject: 'New Assignment: ' . $this->classworkTitle,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.classwork-created',
        );
    }
}
