<?php

namespace App\Listeners;

use App\Mail\SendIcgActivationToken;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendIcgActivationEmail
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
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle($event)
    {
        \Mail::to($event->user)->send(new SendIcgActivationToken($event->user->activationToken));
    }
}
