<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public function stages()
    {
        return $this->hasMany('App\Stage');
    }


}