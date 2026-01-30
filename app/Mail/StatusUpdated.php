<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class StatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    protected Application $application;
    /**
     * Create a new message instance.
     */
    public function __construct(Application $application)
    {
        $this->$application = $application;
    }

    public function build(){

        return $this->subject('You have been shortisted.')
                    ->view('application_shortlisted');
    }
}
