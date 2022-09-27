<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficeUser extends Model
{
    //
    protected $table = 'office_user';

    public function Office()
    {
        return $this->belongsTo('App\Office','office_id','id');
    }
}
