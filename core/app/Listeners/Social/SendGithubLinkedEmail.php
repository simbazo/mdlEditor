<?php

namespace App\Listeners\Social;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\Social\GithubAccountLinked ;
use App\Events\Social\GithubAccountWasLinked;

class SendGithubLinkedEmail
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
    public function handle(GithubAccountWasLinked $event)
    {
        \Mail::to($event->user)->send(new GithubAccountLinked($event->user));
    }
}
