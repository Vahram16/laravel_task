<?php

namespace App\Events;

use App\Events\VerificationEvent;
use App\Jobs\SendVerificationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailVerificationListner
{

    public function __construct()
    {
        //
    }


    public function handle(VerificationEvent $event)
    {
//        $job = new SendVerificationEmail($event->user);
//        $job->delay(10);
//        dispatch($job);
        SendVerificationEmail::dispatch($event->user);

    }
}
