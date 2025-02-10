<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Casual T-Shirt',
                'description' => 'Comfortable cotton T-shirt for everyday wear.',
                'price' => 12.99,
                'category_id' => Str::random(24), // Replace with actual category ID
                'stock' => 50,
                'size' => ['S', 'M', 'L', 'XL'],
                'color' => ['Black', 'White', 'Blue'],
                'images' => [
                
                ],
            ],
            [
                'name' => 'Denim Jacket',
                'description' => 'Stylish denim jacket with a classic look.',
                'price' => 39.99,
                'category_id' => Str::random(24), // Replace with actual category ID
                'stock' => 20,
                'size' => ['S', 'M', 'L'],
                'color' => ['Blue', 'Black'],
                'images' => [
                    
                ],
            ],
            [
                'name' => 'Running Shoes',
                'description' => 'Lightweight running shoes for your daily workout.',
                'price' => 49.99,
                'category_id' => Str::random(24), // Replace with actual category ID
                'stock' => 30,
                'size' => ['US 7', 'US 8', 'US 9', 'US 10'],
                'color' => ['Black', 'White', 'Red'],
                'images' => [ 
                ],
                
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
