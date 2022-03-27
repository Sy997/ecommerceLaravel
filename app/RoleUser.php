<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleUser extends Model
{
    protected $table="role_user";
    
}

class RoleUser extends Pivot
{
    
    
}
