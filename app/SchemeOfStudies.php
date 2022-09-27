<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchemeOfStudies extends Model
{
    //
    protected $table = 'scheme_of_studies';


    public function program()
    {
        return $this->belongsTo('App\Program');
    }
    public function prerequisite_course()
    {
        return $this->belongsTo('App\Course','prerequisite_course_id','id');
    }
    public function course()
    {
        return $this->belongsTo('App\Course','course_id','id');
    }

}
