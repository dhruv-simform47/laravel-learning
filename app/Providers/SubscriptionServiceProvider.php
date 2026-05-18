<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SubscriptionManager;
class SubscriptionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->singleton('subscription-checker',function($app){
            return new SubscriptionManager();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
