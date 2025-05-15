<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StudentContactConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $programName;
    public $departmentNames;
    public $universityName;
    public $websiteURL;

    public function __construct($student, $programName, $departmentNames, $universityName, $websiteURL)
    {
        $this->student = $student;
        $this->programName = $programName;
        $this->departmentNames = $departmentNames;
        $this->universityName = $universityName;
        $this->websiteURL = $websiteURL;
    }

    public function build()
    {
        return $this->subject('Thank You for Your Submission')
                    ->view('Admin.student_contact_confirmation');
    }
}
