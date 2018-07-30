<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    public function stage()
    {
        return $this->belongsTo('App\Stage');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }
}
