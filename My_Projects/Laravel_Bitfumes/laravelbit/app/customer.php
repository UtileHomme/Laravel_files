<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\mobile;

class customer extends Model
{
    public function mobile()
    {
        return $this->hasMany('App\mobile');
    }
}
