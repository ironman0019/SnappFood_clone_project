<?php

namespace App\Listeners;

use App\Events\CreateOrder;
use App\Jobs\SendingEmailCreateOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendingEmail
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
    public function handle(CreateOrder $event): void
    {
        $order = $event->order;
        $email = $event->email;

        SendingEmailCreateOrder::dispatch($email, $order);


    }
}
