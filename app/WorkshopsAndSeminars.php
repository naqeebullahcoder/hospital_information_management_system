<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkshopsAndSeminars extends Model
{
    //
    protected $table = 'workshops_and_seminars';
    public function faculty_member()
    {
        return $this->belongsTo('App\FacultyMembers');
    }
}
