<?php

namespace App\Providers;

use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Queue::before(function ( JobProcessing $event ) {
            Log::info('Job ready: ' . $event->job->resolveName());
            Log::info('Job started: ' . $event->job->resolveName());
        });

        Queue::after(function ( JobProcessed $event ) {
            Log::info('Job finished: ' . $event->job->resolveName());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
