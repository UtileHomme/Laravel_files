<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

        //this exception middleware is not applied to test page
        $this->middleware('editor',['except'=>'test']);
    }

    public function index()
    {
        return view('admin.editor');
    }

    //page accessible to both admin and editor
    public function test()
    {
        return view('admin.test');
    }
}
