<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\Product::create([
            'name' => 'T-Shirt',
            'price' => 19.99,
            'image' => 'products/tshirt.jpg'
        ]);
    }
}
