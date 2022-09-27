<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';

    public function orderform()
    {
        return $this->hasMany('App\Orderform');
    }
}
