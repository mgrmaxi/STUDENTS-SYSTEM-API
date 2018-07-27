<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _Class extends Model
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
