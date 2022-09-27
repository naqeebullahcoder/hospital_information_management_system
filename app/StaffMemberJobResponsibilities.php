<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffMemberJobResponsibilities extends Model
{
    //
    protected $table = 'staff_member_job_responsibilities';

    public function designation()
    {
        return $this->belongsTo('App\Designation');
    }


    public function office()
    {
        return $this->belongsTo('App\Office');
    }
}
