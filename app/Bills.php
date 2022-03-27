<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $table= "bills";
    public $timestamps = false;


    public function bill_detail(){
        return $this->hasMany('App\BillDetail','id_bill','id');
    }

    public function customers(){
        return $this->belongsTo('App\Customers','id_customer','id');
    }

    public function products(){
        return $this->belongsToMany('app\Products','bill_detail','id_bill','id_product');
    }
}
