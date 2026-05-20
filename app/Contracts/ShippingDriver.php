<?php

namespace App\Contracts;

interface ShippingDriver
{
    public function calculateCost(float $weight): float;
}
