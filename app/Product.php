<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'quantity', 'image', 'created_by'];


    //Access product categories and assign many to many relationship
    function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    //define one to many relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
