<?php

namespace App\Listeners\Social;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\Social\TwitterAccountLinked ;
use App\Events\Social\TwitterAccountWasLinked;

class SendTwitterLinkedEmail
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
    public function handle(TwitterAccountWasLinked $event)
    {
        \Mail::to($event->user)->send(new TwitterAccountLinked($event->user));
    }
}
