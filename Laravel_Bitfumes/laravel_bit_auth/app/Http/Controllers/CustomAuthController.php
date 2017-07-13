<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class CustomAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('custom.register');
    }

    public function showLoginForm()
    {
        return view('custom.login');
    }

    public function register(Request $request)
    {
        $this->validation($request);

        $request['password'] = bcrypt($request->password);
        //after validation has been done
        User::create($request->all());
        return redirect('/')->with('Status','You are registered');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('/');
        }
        else
        {
            return 'OOPs';
        }

    }

    public function validation($request)
    {
        return $this->validate($request, [
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|max:255',
        ]);
    }
}
