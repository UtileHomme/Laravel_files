<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  // Post belongs to one category
  public function category()
  {
    return $this->belongsTo('App\Category');
  }

  //for getting the column names of a particular table
  public function getTableColumns()
  {
    return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
  }

  //for Many to Many relation
  public function tags()
  {
    return $this->belongsToMany('App\Tag');
  }

  public function comments()
  {
    return $this->hasMany('App\Comment');
  }
}
