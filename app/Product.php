<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'user_id',
        'category_id',
        'content',
        'feature_image_path',
        'feature_image_name',
    ];

    public function productImages()
    {
        return $this->hasMany('App\ProductImage', 'product_id');
    }

    public function tags()
    {
        return $this
                ->belongsToMany('App\Tag', 'product_tags', 'product_id', 'tag_id')
                ->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
