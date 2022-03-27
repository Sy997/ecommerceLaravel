<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table="products";
    public $timestamps = false;

    public function bill_detail(){
        return $this->hasMany('App\BillDetail','id_bill','id');

    }

    function pageUrl(){
        return $this->belongsTo("App\PageUrl","id_url","id");
        //id : PK page_url : other key
    }
    
    function categories(){
        return $this->belongsTo("App\Categories","id_type","id");
    }

}
