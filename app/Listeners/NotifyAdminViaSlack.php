<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegisterdEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminViaSlack
{
    /**
     * Handle the event.
     *
     * @param  NewCustomerHasRegisterdEvent  $event
     * @return void
     */
    public function handle(NewCustomerHasRegisterdEvent $event)
    {
        //slack notification to admin
        dump("Slacked Admin Massage");

    }
}
