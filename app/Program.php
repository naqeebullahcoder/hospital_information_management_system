<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //
    protected $table = 'programs';
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
    public function scheme_of_study()
    {
        return $this->hasMany('App\SchemeOfStudies');
    }
}
