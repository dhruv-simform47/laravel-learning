<?php

namespace App\Services;

use App\Contracts\ShippingDriver;
use Override;

class TimedShippingDecorator implements ShippingDriver
{
    // 1. It swallows the live instance that Laravel just built
    public function __construct(protected ShippingDriver $originalDriver) {}

    #[Override]
    public function calculateCost(float $weight): float
    {
        // 2. Start the timer watch
        $startTime = microtime(true);

        // 3. Delegate the actual cost calculation math to the original class instance
        $cost = $this->originalDriver->calculateCost($weight);

        // 4. Stop the timer watch
        $endTime = microtime(true);
        $executionTime = ($endTime - $startTime) * 1000; // Convert to milliseconds

        // 5. Injects a performance metric log layout on screen
        echo "<small style='color: #d97706;'>[Performance Telemetry: Calculation took " . round($executionTime, 4) . "ms]</small><br>";

        return $cost;
    }

    #[Override]
    public function pingExternalServer(): bool
    {
        // Pass-through: handle the admin diagnostic check by delegating to the original instance
        return $this->originalDriver->pingExternalServer();
    }
}