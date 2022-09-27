<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HonoursAndAwards extends Model
{
    //
    protected $table = 'honours_and_awards';
    public function faculty_member()
    {
        return $this->belongsTo('App\FacultyMembers');
    }
}
