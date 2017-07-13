<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//adding the model to be used for this page
use App\user;
use App\customer;
use App\people;
use App\role;

class HomeController extends Controller
{
    public function index()
    {
        $user = user::find(1);
        return view('welcome',compact('user'));
    }

    public function passport1()
    {
        //now user has passport details
        $user = user::find(1)->passport;
        // return $user;
        return view('welcome',compact('user'));
    }

    public function customers()
    {
        $mobiles = customer::find(1)->mobile;
        return view('welcome',compact('mobiles'));
    }

    public function roles()
    {
        $roles = people::find(2)->roles;
        return $roles;
        // return view('welcome',compact('roles'));
    }

    public function people()
    {
        $people = role::find(2)->people;
        return $people;
    }
}
