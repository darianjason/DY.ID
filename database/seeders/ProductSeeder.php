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
        // dummy data
        $names = ['Samsung 85” The Frame QLED 4K Smart TV', 'LG C1 83” 4K Smart OLED TV', 'iPhone 13 Pro', 'Google Pixel 6 Pro', 'Nvidia GeForce RTX 3080', 'AMD Radeon RX 6900 XT', 'Lenovo Legion 7', 'MacBook Pro 16" M1 Max'];
        $categories = [1, 1, 2, 2, 3, 3, 4, 4];

        for ($i = 0; $i < count($names); $i++) {
            Product::create([
                'name' => $names[$i],
                'category_id' => $categories[$i]
            ]);
        }
    }
}
