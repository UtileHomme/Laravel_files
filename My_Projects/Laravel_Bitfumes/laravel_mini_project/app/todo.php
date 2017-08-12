<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    // How to define an accessor
    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    //How to define a mutator
    public function setTitleAttribute($value)
    {
        return $this->attributes['title'] = ucfirst($value);
    }
}
