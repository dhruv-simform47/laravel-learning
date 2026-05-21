<?php

namespace App\Services;

use App\Contracts\ShippingDriver;
use Override;

class FedExDriver implements ShippingDriver
{
    #[Override]
    public function calculateCost(float $weight): float
    {
        $cost = $weight * 10;

        return $cost;
    }

    public function pingExternalServer(): bool
    {
        // In a real app, this would use Http::get('https://api.fedex.com/status')
        // We will simulate a healthy connection (true)
        return true; 
    }
}


