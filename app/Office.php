<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    //
    protected $table = 'offices';

    public function office_projects()
    {
        return $this->hasMany('App\OfficeProject');
    }
}
