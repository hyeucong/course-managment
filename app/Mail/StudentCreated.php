<?php

namespace App\Mail;

use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class StudentCreated extends Mailable
{
    use Queueable, SerializesModels;
    public Student $student;
    public $courseId;

    public function __construct(Student $student, $courseId)
    {
        $this->student = $student;
        $this->courseId = $courseId;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('jeffrey@example.com', 'Jeffrey Way'),
            subject: 'Welcome to the Course',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.student-created',
            with: [
                'name' => $this->student->first_name,
                'email' => $this->student->email,
                'courseId' => $this->courseId,
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
        return [];
    }
}
