<?php

namespace App\Listeners;

use Log;
use App\Mail\StatusUpdated;
use App\Models\Application;
use Illuminate\Support\Facades\Mail;
use App\Events\ApplicationShortlisted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;



class SendShortlistedEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ApplicationShortlisted $event): void
    {
        $application= $event->application;
        $applicant = $application->applicant;

        Mail::to($applicant->email)->send(new StatusUpdated($application));
        
    }
}
