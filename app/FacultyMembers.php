<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FacultyMembers extends Model
{
    //

    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'designation_id',
        'picture',
        'email',
        'qualification',
        'department_id',
        'faculty_member_type_id',
        'biography',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
    ];




    protected $table = 'faculty_members';

    public function honours_and_awards()
    {
        return $this->hasMany('App\HonoursAndAwards')->orderBy('year','DESC');;
    }
    public function publications_and_conferences()
    {
        return $this->hasMany('App\PublicationsAndConferences')->orderBy('year','DESC');;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workshops_and_seminars()
    {
        return $this->hasMany('App\WorkshopsAndSeminars')->orderBy('year','DESC');;
    }
    public function memberships()
    {
        return $this->hasMany('App\Memberships')->orderBy('year','DESC');
    }



    public function designation()
    {
        return $this->belongsTo('App\Designation');
    }

    public function faculty_member_type()
    {
        return $this->belongsTo('App\FacultyMember_types');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
