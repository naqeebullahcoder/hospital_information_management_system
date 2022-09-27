<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    //
    protected $table = 'designations';

    public function faculty_members()
    {
        return $this->hasMany('App\FacultyMembers');
    }

}
