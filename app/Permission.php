<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = [];
    
    public function childrenPermission()
    {
        return $this->hasMany('App\Permission', 'parent_id');
    }
}
