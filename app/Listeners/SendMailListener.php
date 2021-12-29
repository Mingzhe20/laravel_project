<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\SendMailEvent;
use App\Mail\NewApplicationMail;
use Illuminate\Support\Facades\Mail;

class SendMailListener
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
    public function handle(SendMailEvent $event)
    {
        Mail::to('admin@gmail.com')->send(new NewApplicationMail($event->intern));
    }
}
