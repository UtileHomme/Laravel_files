<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DependencyTest;

class DependencyController extends Controller
{
    // private $test;
    //
    // public function dashboard(DependencyTest $test)
    // {
    //
    // }
    //
    // public function __construct(DependencyTest $test)
    // {
    //     // echo 'Constructor function for Admin Controller';
    //     $this->test = $test;
    // }

    public function dashboard(DependencyTest $test, $name)
    {
        //tells the class name of the object
        // dd((get_class($test)));

        echo "<h1>$name</h1>";
    }
}
