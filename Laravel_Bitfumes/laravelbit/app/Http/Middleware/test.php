<?php

// Every request that is made if first passed through a middleware
// for authentication purposes and only then is it sent to the backend

namespace App\Http\Middleware;

use Closure;
use App\user;
use Illuminate\Http\Request;

class test
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$name)
    {
        // $ip = $request->ip();
        // if($ip=='127.1.0.1')
        // {
        //     // throw new \Exception('Your ip is correct');
        //     return redirect('/');
        // }
        $user = user::find(1);
        if($name != $user->name)
        {
            throw new \Exception('Your name is not valid',1);

        }
        return $next($request);

    }
}
