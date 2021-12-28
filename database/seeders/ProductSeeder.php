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
        $names = ['TV 1', 'TV 2', 'TV 3', 'Phone 1', 'Phone 2', 'Phone 3', 'Laptop 1', 'Laptop 2', 'Laptop 3'];
        $categories = [1, 1, 1, 2, 2, 2, 3, 3, 3];

        for ($i = 0; $i < count($names); $i++) {
            Product::create([
                'name' => $names[$i],
                'category_id' => $categories[$i]
            ]);
        }
    }
}
