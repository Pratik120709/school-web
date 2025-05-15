<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminStudentContactNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    /**
     * Create a new message instance.
     */

    public function __construct($student)
    {
        $this->student = $student;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Student Contact Confirmation',
        );
    }
    
    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->subject('New Student Contact Submission')
                    ->view('Admin.admin_student_contact_notification');
    }
}
