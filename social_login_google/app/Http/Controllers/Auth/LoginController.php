<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use App\User;

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
    protected $redirectTo = '/home';

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
    * Obtain the user information from GitHub.
    *
    * @return Response
    */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $userModel = User::where('email', $user->getEmail())->first();

        if($userModel)
        {
            $userModel = User::where('email', $user->getEmail())->first();
        }
        else
        {
        $userModel = new User;

        $userModel->name = $user->name;
        $userModel->email = $user->getEmail();

        // echo $user->getAvatar();
        $userModel->save();
    }
        // dd($userModel);
            Auth::login($userModel, true);
            return redirect()->route('home');
    }
}
