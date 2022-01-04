<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // dummy data
        $categories = ['Television', 'Smartphone', 'Graphics Card', 'Laptop'];

        for ($i = 0; $i < count($categories); $i++) {
            Category::create([
                'name' => $categories[$i]
            ]);
        }
    }
}
