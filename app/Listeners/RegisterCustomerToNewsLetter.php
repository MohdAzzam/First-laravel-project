<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegisterdEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegisterCustomerToNewsLetter
{
    /**
     * Handle the event.
     *
     * @param  NewCustomerHasRegisterdEvent  $event
     * @return void
     */
    public function handle(NewCustomerHasRegisterdEvent $event)
    {

        //dump("Registered To Our Newspaper");

    }
}
