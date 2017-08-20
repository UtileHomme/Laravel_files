<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    public function index()
    {
        
    }
    public function passport()
    {
        //one to one relationship
        return $this->hasOne('App\passport');
        // return $this->hasOne(Passport::class);     --- not working
    }
}
