<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    //  where to redirect user after login
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      /* guest middleware is checking whether you are guest or not
       Either you need to be a guest or you need to be logged out
       We don't want anyone who's logged in to go to login page by any means

       We don't wish to apply any middleware for logout
       */

      //  auth is for checking that only people logged in are allowed to access those pages

      //we don't want guests going to logout page
        $this->middleware('guest')->except('logout');
    }
}
