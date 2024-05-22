<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'The Lord of the Rings',
                'category' => 'Books',
                'price' => 50.50,
                'image' => 'lotr.png',
            ],
            [
                'name' => 'Game of Thrones',
                'category' => 'Books',
                'price' => 25.00,
                'image' => 'got.png',
            ],
            [
                'name' => 'Chocolate Bar',
                'category' => 'Food',
                'price' => 9.99,
                'image' => 'chocolate-bar.png',
            ],
            [
                'name' => 'Box of Chocolates',
                'category' => 'Food',
                'price' => 14.99,
                'image' => 'imported-chocolates.png',
            ],
            [
                'name' => 'Music CD',
                'category' => 'Other',
                'price' => 15.00,
                'image' => 'californication.png',
            ],
            [
                'name' => 'Bottle of Perfume',
                'category' => 'Other',
                'price' => 50.50,
                'image' => 'chanel.png',
            ],
            [
                'name' => 'Headache Pills',
                'category' => 'Medical Products',
                'price' => 15.00,
                'image' => 'headache-pills.png',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}