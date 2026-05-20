<?php

namespace App\Services;

use App\Contracts\ShippingDriver;
use Override;

class BluedartDriver implements ShippingDriver
{
    #[Override]
    public function calculateCost(float $weight): float
    {
        $cost = $weight * 5;

        return $cost;
    }
}
