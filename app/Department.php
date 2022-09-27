<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Department extends Model
{
    //
    protected $table = 'departments';

//    public function orderform()
//    {
//        return $this->hasMany('App\Orderform');
//    }
    public function core_values()
    {
        return $this->hasMany('App\DepartmentCoreValues');
    }
    public function objectives()
    {
        return $this->hasMany('App\DepartmentObjectives');
    }

    public function programs()
    {
        return $this->hasMany('App\Program');
    }

    public function sub_departments()
    {
        return $this->hasMany('App\Department','parent_id','id');
    }
    public function department()
    {
        return $this->belongsTo('App\Department','parent_id','id');
    }
    public function faculty()
    {
        return $this->belongsTo('App\Faculties','faculties_id','id');
    }
    public function faculty_members()
    {
        return $this->hasMany('App\FacultyMembers','department_id','id');
    }

}
