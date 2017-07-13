<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperuserController extends Controller
{
    	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('superuser');
    }

    public function index()
    {
    	return view('admin.superuser');
    }
}
