<?php

namespace App\Http\Controllers;

use App\Contracts\ShippingDriver;

class BulkOrderController extends Controller
{
    //
    public function __construct(protected ShippingDriver $deliveryPartner) {}

    public function getCost()
    {
        $weight = 100;
        $cost = $this->deliveryPartner->calculateCost($weight);
        $arr = explode('\\', get_class($this->deliveryPartner));
        $partner = end($arr);
        echo 'For Bulk Order Dilevery Partner  <br><b>: '.$partner.' </b> --- Yahi Rahega <br> or uska bhada <br> :'.'<b>'.$cost.'</b> --- itna hi rahega bhiduuu...!';

    }
}
