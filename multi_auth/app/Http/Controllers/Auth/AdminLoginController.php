<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
      //people who are not logged in should have access to this
      //if we use middleware('guest:admin')

      //this will restrict the user from accessing the admin login page from url if logged in
      $this->middleware('guest:admin',['except'=>['logout']]);
    }

    //this is going to show the login form view
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
      /*
        validate the form data
        attempt to log the user in
        if successful, then redirect to their intended location
        if unsuccessful, then redirect back to login with the form data
      */

      $this->validate($request,
        [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]
      );

      //parameters are credentials, remember
      //we need to specify the guard to work

      if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))
      {
        return redirect()->intended(route('admin.dashboard'));
      }

      //sends them to the login page
      //withInput will pass the relevant filled data
      return redirect()->back()->withInput($request->only('email','remember'));

    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/');
    }
}
