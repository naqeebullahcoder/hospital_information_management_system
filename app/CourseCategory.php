<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    //
    protected $table = 'course_categories';

    public function scheme_of_study()
    {
        return $this->hasMany('App\SchemeOfStudies');
    }

}
