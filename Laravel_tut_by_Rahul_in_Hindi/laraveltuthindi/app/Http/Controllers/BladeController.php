<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BladeController extends Controller
{
    public function dashboard()
    {
        // before dot is directory , after is file.. we can also put /
        return view('layout/bladelayout');
    }
}
