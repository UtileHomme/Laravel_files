<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Log;
use DB;
use App\Activity;

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
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }



 protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        foreach ($this->guard('admin')->user()->role as $role) {
           if($role->name == 'admin')
           {
            return redirect('admin/home');
           }elseif($role->name == 'customercare')
           {
            return redirect('admin/customercare');
           }elseif($role->name == 'Management')
           {
            return redirect('admin/management');
           }elseif($role->name == 'Coordinator')
           {
            return redirect('admin/coordinator');
           }elseif($role->name == 'Care_provider')
           {
            return redirect('admin/careprovider');
           }elseif($role->name == 'super_user')
           {
            return redirect('admin/superuser');
           }elseif($role->name == 'vertical')
           {
            return redirect('admin/vertical');
           }

        }

    }


     /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function logout(Request $request)
    {
      /*
      Code for storing Logout info starts here - by jatin
      */



      //Here we are trying to retrieve the session id of the person who is logged in
      $log_session_id = DB::table('logs')->where('session_id', session()->getId())->value('session_id');
      $username = DB::table('logs')->where('session_id', session()->getId())->value('name');

      $emp_id = DB::table('employees')->where('FirstName', $username)->value('id');
      $log_id = DB::table('logs')->where('session_id',session()->getId())->value('id');

      $activity = new Activity;
      $activity->emp_id = $emp_id;
      $activity->activity = "Log Out";
      $activity->activity_time = new \DateTime();
      $activity->log_id = $log_id;
      $activity->save();

      // //Here we want to get the created_at column value for the login session
      // $log_created_at = DB::table('logs')->where('session_id', session()->getId())->value('created_at');
      //
      //
      //
      //   $time = time();
      //   $logout_atc = date('Y-m-d H:i:s', $time);
      //   $logout_ats = ['logout_time' => $logout_atc];
      //   $status = "Logged out";
      //   $logout_atk = ['login_time' => $log_created_at,'status'=>$status];
      //   $status1 = "Logged in";
      //
      //
      //
      //   //Here we are updating the login_at and logout_at fields with their appropriate values
      //   DB::table('logs')->where('session_id',$log_session_id)->update($logout_ats);
      //   DB::table('logs')->where([['session_id','=',$log_session_id],['status','=',$status1]])->update($logout_atk);
      //



      /*
      Code for logging info ends here - by jatin
      */


        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }
     /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }




}
