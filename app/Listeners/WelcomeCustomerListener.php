<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegisterdEvent;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class WelcomeCustomerListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NewCustomerHasRegisterdEvent $event)
    {
        sleep(5);
        Mail::to($event->customer->email)->send(new WelcomeNewUserMail());

    }
}
