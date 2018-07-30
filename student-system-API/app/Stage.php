<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function classroom()
    {
        return $this->hasMany('App\Classroom');
    }
    public function students()
    {
        return $this->hasMany('App\Student');
    }
}
