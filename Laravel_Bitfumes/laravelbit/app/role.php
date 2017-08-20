<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public function people()
    {
        // return $this->belongsToMany(people::class)->withPivot('created_at');
        return $this->belongsToMany(people::class)->withTimestamps();
    }
}
