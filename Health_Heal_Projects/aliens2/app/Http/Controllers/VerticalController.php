<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerticalController extends Controller
{

	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('vertical');
    }


    public function index()
    {
    	return view('admin.vertical');
    }
}
