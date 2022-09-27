<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicationsAndConferences extends Model
{
    //
    protected $table = 'publications_and_conferences';
    public function faculty_member()
    {
        return $this->belongsTo('App\FacultyMembers');
    }
}
