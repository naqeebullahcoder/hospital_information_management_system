<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memberships extends Model
{
    //
    protected $table = 'memberships';
    public function faculty_member()
    {
        return $this->belongsTo('App\FacultyMembers');
    }
}
