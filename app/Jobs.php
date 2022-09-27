<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    //
    protected $table = 'jobs';

    public function job_type()
    {
        $this->hasOne('App\JobTypes','type','id');
    }
}
