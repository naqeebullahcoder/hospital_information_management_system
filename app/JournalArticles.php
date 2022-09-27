<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalArticles extends Model
{
    //
    protected $table = 'journal_articles';
    public function faculty_member()
    {
        return $this->belongsTo('App\FacultyMembers');
    }
}
