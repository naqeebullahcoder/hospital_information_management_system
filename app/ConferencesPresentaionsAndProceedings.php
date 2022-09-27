<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConferencesPresentaionsAndProceedings extends Model
{
    //
    protected $table = 'conferences_presentaions_and_proceedings';
    public function faculty_member()
    {
        return $this->belongsTo('App\FacultyMembers');
    }
}
