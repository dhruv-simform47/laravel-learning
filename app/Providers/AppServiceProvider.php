<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        RateLimiter::for('procesing-limit',function(Request $request){
            $tier=$request->query('tier');

            if($tier=="premium")
                {
                    return Limit::perMinute(100)->by($request->ip());
                }
            return Limit::perMinute(5)->by($request->ip());

        });
    }
}
