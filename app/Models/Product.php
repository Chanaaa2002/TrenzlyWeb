<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Product extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'stock',
        'size',
        'color',
        'images',
    ];

    protected $casts = [
        'images' => 'array', // Cast images JSON field to an array
        'category_id' => 'string', // Ensure category_id is stored as a string
    ];

    /**
     * Relationship to Category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', '_id'); // Correct relationship order
    }
}
