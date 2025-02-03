<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Category extends Eloquent
{
    protected $connection = 'mongodb';  
    protected $collection = 'categories'; 

    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', '_id'); // Fix relationship
    }
}
