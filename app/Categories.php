<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table= "categories";
    
    function pageUrlCate(){
        return $this->belongsTo("App\PageUrl","id_url","id");
        //id : PK page_url : other key
    }

    function products(){
        return $this->hasMany('App\Products','id_type','id');
        
        //id : categories : local key
    }

    function levelTwo(){
        return $this->hasMany('App\Categories','id_parent','id');
    }

}
