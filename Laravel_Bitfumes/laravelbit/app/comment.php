<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\Relation;

// Relation:morphMap([
// 'line'=>'App\Line',
// 'video'=>'App\Video'
// ]);

class comment extends Model
{
    public function commentable()
    {
        return $this->morphTo();
    }
}
