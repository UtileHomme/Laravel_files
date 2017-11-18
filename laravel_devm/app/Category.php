<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //we are telling laravel to use the 'categories' table when working with this model
    protected $table = 'categories';

    // One to many relationship - one category belongs to many posts
    public function posts()
    {
      return $this->hasMany('App\Post');
    }
}
