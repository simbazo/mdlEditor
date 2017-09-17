<?php

namespace App\Listeners\Social;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\Social\FacebookAccountLinked ;
use App\Events\Social\FacebookAccountWasLinked;

class SendFacebookLinkedEmail
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
     * @param  GithubAccountWasLinked  $event
     * @return void
     */
    public function handle(FacebookAccountWasLinked $event)
    {
        \Mail::to($event->user)->send(new FacebookAccountLinked($event->user));
    }
}
