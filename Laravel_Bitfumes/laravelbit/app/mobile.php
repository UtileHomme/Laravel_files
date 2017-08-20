<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mobile extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\customer');
    }
}
