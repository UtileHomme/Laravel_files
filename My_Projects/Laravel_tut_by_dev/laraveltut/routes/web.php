<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    echo "Welcome to my page";
});

Route::get('hello/{name}',function($name)
{
    echo 'Hello there '.$name;
});

Route::post('test',function()
{
    echo 'POSTED';
}
);

Route::get('test',function()
{
    //as soon as submit button is clicked, we will be redirected to put part
    echo '<form action="test" method="POST">';
    echo '<input type="submit" value="submit" />';
    echo '<input type="hidden" name="_token" value="'.csrf_token().'" />';

    //if we want submit button to perform PUT operation, add a hidden section
    echo '<input type="hidden" name="_method" value="PUT" />';
    echo '</form>';
}
);

Route::put('test',function()
{
    echo 'PUT';
}
);

Route::delete('test',function()
{
    echo 'DELETED';
}
);

//instead of using functions we can use controllers
Route::get('test123', 'TestController@index');



//using controllers for logic  ---IMPORTANT
Route::get('wants_customer/{id}','CustomerController@show');

Route::get('gets_customer','CustomerController@get_customer');

Route::get('gets_order','OrderController@get_order');

//without controllers

Route::get('customer/{id}',function($id)
{
    $customer = App\Customer::find($id);
    echo 'Hello my name is '.$customer->name;
}
);

Route::get('get_customer',function()
{
    $customer = App\Customer::where('name','=','kritika')->first();
    echo $customer->name;
}
);

//how to create joins/relationships
Route::get('orders',function()
{
    $orders = App\Order::all();
    foreach($orders as $order)
    {
        $customer = App\Customer::find($order->customer_id);
        echo $order->name." ordered by ".$customer->name."<br />";
    }
}
);

//how to create joins using function inside model
Route::get('get_orders',function()
{
    $orders = App\Order::all();
    foreach($orders as $order)
    {
        //customer is the function defined in Orders.php
        echo $order->name." ordered by ".$order->customer->name."<br />";
    }
}
);

//create function inside customer.php for orders to create relationship
Route::get('want_customer/{id}',function($id)
{
    $customer = App\Customer::find($id);
    echo 'Hello my name is '.$customer->name.'<br />';

    //inside customer controller we have orders function
    $orders = $customer->orders;

    foreach($orders as $order)
    {
        echo $order->name."<br />";
    }
}
);

Route::get('my_page',function()
{
    $customers = App\Customer::all();
    $data = array(
    'customers'=>$customers
    );
    return view('mypage',$data);
}
);

Route::get('master_page',function()
{
    $customers = App\Customer::all();
    $data = array(
    'customers'=>$customers
    );
    return view('masters',$data);
}
);
