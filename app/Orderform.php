<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderform extends Model
{
    protected $table = 'order_master';

    public function patients()
    {
        return $this->belongsTo('App\Patient','patient_id','id');
    }
    public function departments()
    {
        return $this->belongsTo('App\Department','department_id','id');
    }
    public function users()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function OrderDetails()
    {
        return $this->hasMany('App\Orderdetails','order_id','id');
    }
    public function Status()
    {
        return $this->belongsTo('App\Status' ,'status','id');
    }


}
