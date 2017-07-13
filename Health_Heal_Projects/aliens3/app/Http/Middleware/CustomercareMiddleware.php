<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Log;
use DB;
use App\Activity;

class CustomercareMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        foreach (Auth::user()->role as $role) {
            if($role->name == 'customercare'){

              //We are saving the session_id, person who logged in's name in the 'logs' table
              $current_session = DB::table('logs')->where('session_id',session()->getId())->value('session_id');

              if($current_session!= session()->getId())
              {
              $logs = new Log;
              $logs->name = Auth::user()->name;
              // $logs->status = "Logged In";
              // $logs->login_time = new \DateTime();
              $logs->session_id = session()->getId();


              $logs->save();

              //here we are retrieving the employee id from the employees table and the log id from the log table
              $emp_id = DB::table('employees')->where('FirstName', $logs->name)->value('id');
              $log_id = DB::table('logs')->where('name',$logs->name)->value('id');

              //here we are storing all the above in the activity table
              $activity = new Activity;
              $activity->emp_id = $emp_id;
              $activity->activity = "Login";
              $activity->activity_time = new \DateTime();
              $activity->log_id = $log_id;
              $activity->save();
              }
              /*
              Code for storing Log in ended here -- by jatin
              */

                 return $next($request);
            }
        }
        return redirect('');
    }
}
