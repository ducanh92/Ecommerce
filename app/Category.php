<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'parent_id',
        'slug'
    ];

    public function childrenCategories()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function products()
    {
        return $this->hasMany('App\Product', 'category_id');
    }
}
