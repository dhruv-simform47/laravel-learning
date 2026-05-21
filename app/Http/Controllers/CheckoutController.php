<?php

namespace App\Http\Controllers;

use App\Contracts\ShippingDriver;

class CheckoutController extends Controller
{
    //

    public function __construct(protected ShippingDriver $deliveryPartner) {}

    public function getCost()
    {
        $weight = (float) request()->input('weight');
        $cost = $this->deliveryPartner->calculateCost($weight);
        echo 'You Selected Delivery partner : '.request()->input('delivery_partner').'<br> which Cost you :'.'<b>'.$cost.'<b>';

    }
}
