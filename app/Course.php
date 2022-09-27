<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table = 'courses';

    public function course_category()
    {
        return $this->belongsTo('App\CourseCategory');
    }
    public function scheme_of_study()
    {
        return $this->hasMany('App\SchemeOfStudies');
    }

}
