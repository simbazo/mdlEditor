<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */ 
    protected $listen = [
        'App\Events\UserRegistered' => [
            'App\Listeners\SendActivationEmail',
        ],
         'App\Events\UserRequestedActivationEmail' => [
            'App\Listeners\SendActivationEmail',
        ],
         'App\Events\IcgUserRegistered' => [
            'App\Listeners\SendIcgActivationEmail',
        ],
        'App\Events\Social\GithubAccountWasLinked' => [
            'App\Listeners\Social\SendGithubLinkedEmail',
        ],

        'App\Events\Social\FacebookAccountWasLinked' => [
            'App\Listeners\Social\SendFacebookLinkedEmail',
        ],

        'App\Events\Social\TwitterAccountWasLinked' => [
            'App\Listeners\Social\SendTwitterLinkedEmail',
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
