<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreFormValidation;

class formController extends Controller
{

    public function index()
    {
        return view('form');
    }

    public function store(StoreFormValidation $request)
    {
        
    }
}
