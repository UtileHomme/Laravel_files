<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class subs
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function subs_only($user)
    {
      
      if($user->subs==1)
      {
          return true;
      }
      else
      {
          return false;
      }
    }
}
