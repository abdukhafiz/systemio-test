<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Product 1',
                'price' => 150.99,
            ],
            [
                'name' => 'Product 2',
                'price' => 100,
            ],
            [
                'name' => 'Product 3',
                'price' => 50,
            ],
        ];

        resolve(Product::class)->insert($products);
    }
}
