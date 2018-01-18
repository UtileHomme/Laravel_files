<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    public function search($searchKey)
    {
        $users = User::search($searchKey)->get();
        // dd($use)
        return view('search',compact('users'));
    }
}
