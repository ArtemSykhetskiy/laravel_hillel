<?php

namespace App\Listeners;

use App\Jobs\OrderCreatedNotificationJob;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        OrderCreatedNotificationJob::dispatch($event->order)->onQueue('emails');
    }
}
