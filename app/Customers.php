<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table="customers";
    public $timestamps = false;

    public function bills(){
        return $this->hasMany('App\Bills','id_customer','id');
    }

    function billDetails(){
        return $this->hasManyThrough(
            'App\BillDetail',
            'App\Bills',
            'id_customer',
            'id_bill',
            'id',
            'id'
        );
    }
    
}
