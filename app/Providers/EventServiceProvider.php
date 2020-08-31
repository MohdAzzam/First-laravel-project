<?php

namespace App\Providers;

use App\Events\NewCustomerHasRegisterdEvent;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewCustomerHasRegisterdEvent::class => [
            \App\Listeners\WelcomeCustomerListener::class,
            \App\Listeners\RegisterCustomerToNewsLetter::class,
            \App\Listeners\NotifyAdminViaSlack::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
