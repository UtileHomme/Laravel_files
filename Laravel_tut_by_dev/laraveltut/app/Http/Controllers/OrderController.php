<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order as Order;

class OrderController extends Controller
{
    public function get_order()
    {
        $orders = Order::all();
        foreach($orders as $order)
        {
            //customer is the function defined in Orders.php
            echo $order->name." ordered by ".$order->customer->name."<br />";
        }
    }
}
