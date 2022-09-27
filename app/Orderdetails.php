<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    protected $table = 'order_details';

    public function Service()
    {
        return $this->belongsTo('App\Services','service_id','id');
    }
    public function Doctor()
    {
        return $this->belongsTo('App\FacultyMembers','doctor_id','id');
    }

}
