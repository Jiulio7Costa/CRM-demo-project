<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\Registered;
use App\Listeners\SendSuccessEmail;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendSuccessEmail::class,
        ],
    ];

    public function boot()
    {
        //
    }
}
