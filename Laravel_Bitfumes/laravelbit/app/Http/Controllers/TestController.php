<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('test');
        //assigning multiple middlewares
        //$this->middleware('test','test2'); or we can create a group of middlewares by assigning it a name
    }

    public function about()
    {
        return view('middleware');
    }

    public function contact()
    {
        return view('contact');
    }
}
