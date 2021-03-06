<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\subs;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        User::class => subs::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        //when using gates
//         Gate::define('subs-only', function ($user) {
//           echo "hello";
//             if($user->subs==1)
//             {
//                 return true;
//             }
//             else
//             {
//                 return false;
//             }
//
// });

    //when using policies

    Gate::define('subs-only','App\Policies\subs@subs_only');

    Gate::resource('subs', 'App\Policies\subs');

    }
}
