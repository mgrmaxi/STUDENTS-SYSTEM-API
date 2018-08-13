<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = [
        'f_name', 'm_name', 'l_name','dob', 'id_number', 'status',
        'email', 'mobile' ,'image', 'attach', 'address', 'evening_study',
        'department_id', 'classroom_id','stage_id'    ];




    public function department()
    {
        return $this->belongsTo('App\Department');
    }


    public function stage()
    {
        return $this->belongsTo('App\Stage');
    }


    public function Class()
    {
        return $this->belongsTo('App\Classroom');
    }
}