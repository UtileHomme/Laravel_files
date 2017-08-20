<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function index()
    {
        echo 'Index methods from Admin Controller';
    }

    public function view()
    {
        return view('welcome');
    }

    public function postMethod()
    {

    }

    //variable passed should have same name
    public function parameter($number)
    {
        echo 'No passed is '.$number;
    }

    //how to define middlewares in controllers
    public function __constuct()
    {
        $this->middleware(['logger'],['only' => ['index','parameter']]);
        //the second parameter ensures that middlewares are called only for the mentioned methods
        //we can also use except
    }
}


?>
