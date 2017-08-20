<?php

namespace App\Http\Controllers;

use App\Customer as Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function show($id)
    {
        $customer = Customer::find($id);
        echo 'Hello my name is '.$customer->name.'<br />';

        //inside customer controller we have orders function
        $orders = $customer->orders;

        foreach($orders as $order)
        {
            echo $order->name."<br />";
        }
    }

    public function get_customer()
    {
        $customer = Customer::where('name','=','kritika')->first();
        echo $customer->id;
    }

}
