<?php

namespace App\Providers;

use App\Contracts\ShippingDriver;
use App\Http\Controllers\BulkOrderController;
use App\Services\BluedartDriver;
use App\Services\FedExDriver;
use App\Services\LogAggregator;
use App\Services\TimedShippingDecorator;
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

        $this->app->bind(FedExDriver::class);
        $this->app->bind(BluedartDriver::class);

        // Group them under the playlist tag string
        $this->app->tag([FedExDriver::class, BluedartDriver::class], 'shipping-services');

        // Wire the playlist straight to the LogAggregator
        $this->app->bind(LogAggregator::class, function ($app) {
            return new LogAggregator($app->tagged('shipping-services'));
        });

        $this->app->extend(FedExDriver::class, function ($service, $app) {
            return new TimedShippingDecorator($service);
        });
    }

    public function boot(): void
    {
        //
    }
}
