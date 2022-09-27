<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';

    public function orderdetails()
    {
        return $this->belongsTo('App\Services', 'service_id', 'id');
    }
}