<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class Pagination extends Controller
{
    public function users()
    {
        // $users = user::simplePaginate(2);   //this will give pagination without numberings
        $users = User::paginate(2);
        return view('pagination',compact('users'));
    }
}
