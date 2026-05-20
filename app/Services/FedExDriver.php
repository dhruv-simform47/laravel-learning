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
}
