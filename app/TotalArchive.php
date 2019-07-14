<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TotalArchive extends Model
{
    protected $fillable=['total_products', 'total_categories', 'total_users'];
}
