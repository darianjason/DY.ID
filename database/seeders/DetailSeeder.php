<?php

namespace Database\Seeders;

use App\Models\Detail;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // dummy data
        $products = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $prices = [5000000, 10000000, 15000000, 2000000, 12000000, 20000000, 8000000, 15000000, 17000000];
        $images = ['Image 1', 'Image 2', 'Image 3', 'Image 4', 'Image 5', 'Image 6', 'Image 7', 'Image 8', 'Image 9'];
        $descriptions = ['Description 1', 'Description 2', 'Description 3', 'Description 4', 'Description 5', 'Description 6', 'Description 7', 'Description 8', 'Description 9'];

        for ($i = 0; $i < count($products); $i++) {
            Detail::create([
                'product_id' => $products[$i],
                'price' => $prices[$i],
                'image' => $images[$i],
                'description' => $descriptions[$i]
            ]);
        }
    }
}
