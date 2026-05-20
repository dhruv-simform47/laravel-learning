<?php

namespace App\Providers;

use App\Contracts\ShippingDriver;
use App\Http\Controllers\BulkOrderController;
use App\Services\BluedartDriver;
use App\Services\FedExDriver;
use Illuminate\Support\ServiceProvider;

class ShippingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->when(BulkOrderController::class)->needs(ShippingDriver::class)->give(FedExDriver::class);
        
        $this->app->scopedIF(ShippingDriver::class, function ($app) {
            $choice = request()->input('delivery_partner');

            return match ($choice) {
                'fedex' => new FedExDriver,
                default => new BluedartDriver
            };

        });
    }

    public function boot(): void
    {
        //
    }
}
