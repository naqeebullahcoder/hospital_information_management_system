<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultyMemberTypes extends Model
{
    //
    protected $table = 'faculty_member_types';

    public function faculty_members()
    {
        return $this->hasMany('App\FacultyMembers');
    }
}
