<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaffMember extends Model
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
        'office_id',
        'biography',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
    ];




    protected $table = 'staff_members';
    public function designation()
    {
        return $this->belongsTo('App\Designation');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function office()
    {
        return $this->belongsTo('App\Office');
    }
    public function staff_member_job_responsibilities()
    {
        return $this->hasMany('App\StaffMemberJobResponsibilities','staff_member_id','id')->orderBy('priority');
    }

}
