<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    //Access product categories and assign many to many relationship
    function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
