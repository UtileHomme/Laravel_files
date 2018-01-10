<?php

namespace App\Policies;

use App\Model\admin\admin;
use App\Model\user\post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
    * Determine whether the user can view the post.
    *
    * @param  \App\Model\user\admin  $user
    * @param  \App\post  $post
    * @return mixed
    */
    public function view(admin $user)
    {
        //
    }

    /**
    * Determine whether the user can create posts.
    *
    * @param  \App\Model\user\admin  $user
    * @return mixed
    */
    public function create(admin $user)
    {
        return $this->getPermission($user,3);
    }

    /**
    * Determine whether the user can update the post.
    *
    * @param  \App\Model\user\admin  $user
    * @param  \App\post  $post
    * @return mixed
    */
    public function update(admin $user)
    {
        return $this->getPermission($user,4);

    }

    /**
    * Determine whether the user can delete the post.
    *
    * @param  \App\Model\user\admin  $user
    * @param  \App\post  $post
    * @return mixed
    */
    public function delete(admin $user)
    {

        return $this->getPermission($user,5);

    }

    public function tag(admin $user)
    {

        return $this->getPermission($user,10);

    }

    public function category(admin $user)
    {

        return $this->getPermission($user,11);

    }

    protected function getPermission($user, $p_id)
    {
        foreach($user->roles as $role)
        {
            foreach($role->permissions as $permission)
            {
                if($permission->id==$p_id)
                {
                    return true;
                }
            }
        }

        return false;
    }
}
