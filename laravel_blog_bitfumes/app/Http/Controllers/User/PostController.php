<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\post;

class PostController extends Controller
{
    public function post(post $slug)
    {
        
        return view('user.post',compact('slug'));
    }
}
