<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculties extends Model
{
    //
    protected $table = 'faculties';

    public function departments()
    {
        return $this->hasMany('App\Department');
    }


}
