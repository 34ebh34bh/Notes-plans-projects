<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\eventtask;
use App\Events\eventproject;
use App\Events\eventskills;
use App\Listeners\listenertask;
use App\Listeners\listenerproject;
use App\Listeners\listenerskills;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    protected $listen = [
        eventtask::class=>[
            listenertask::class,
        ],
        eventproject::class=>[
            listenerproject::class,
        ],
        eventskills::class=>[
            listenerskills::class,
        ],
    ];

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
