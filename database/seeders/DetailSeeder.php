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
        $products = [1, 2, 3, 4, 5, 6, 7, 8];
        $prices = [60000000, 90000000, 20000000, 20000000, 10000000, 15000000, 20000000, 50000000];
        $images = ['images/Samsung 85” The Frame QLED 4K Smart TV.jpg', 'images/LG C1 83” 4K Smart OLED TV.jpg', 'images/Apple iPhone 13 Pro.jpg', 'images/Google Pixel 6 Pro.jpg', 'images/Nvidia GeForce RTX 3080.jpg', 'images/AMD Radeon RX 6900 XT.jpg', 'images/Lenovo Legion 7.jpg', 'images/MacBook Pro.jpg'];
        $descriptions = ['TV when it\'s on. Art when it\'s off. Showcase your own style with The Frame. Showcase lifelike art, photos, TV, and movies in stunning 4K resolution on a display with customizable bezels for endless combinations to customize your décor.', 'LG OLED TV is a joy to behold. Self-lit pixels allow truly spectacular picture quality and a whole host of design possibilities, while the latest cutting-edge technologies help deliver unprecedented levels of wonder. This is everything you love about TV — elevated in every way.', 'Oh. So. Pro. A dramatically more powerful camera system. A display so responsive, every interaction feels new again. The world\'s fastest smartphone chip. Exceptional durability. And a huge leap in battery life. Let\'s Pro.', 'The best of Google, built around you. The smartest and fastest Pixel yet.', 'The RTX 3080 graphics card delivers the ultra performance that gamers crave, powered by Ampere—NVIDIA\'s 2nd gen RTX architecture. It is built with enhanced RT Cores and Tensor Cores, new streaming multiprocessors, and superfast G6X memory for an amazing gaming experience.', 'Performance to Rule Your Game with Radeon™ RX 6900 XT Graphics. The AMD Radeon™ RX 6900 XT graphics card, powered by AMD RDNA™ 2 architecture, featuring 80 powerful enhanced Compute Units, 128 MB of all new AMD Infinity Cache and 16GB of dedicated GDDR6 memory, is engineered to deliver ultra-high frame rates and serious 4K resolution gaming.', 'Devastation in a clean, portable package. Beneath the refined surface of each Legion 7 Series Gaming Laptop lies the processing and graphics power of a beast. Each precision-crafted, high-grade aluminum chassis hides devastation, just waiting for you to unleash it.', 'Supercharged for pros. The most powerful MacBook Pro ever is here. With the blazing-fast M1 Max chip — the first Apple silicon designed for pros — you get groundbreaking performance and amazing battery life. Add to that a stunning Liquid Retina XDR display, the best camera and audio ever in a Mac notebook, and all the ports you need. The first notebook of its kind, this MacBook Pro is a beast.'];

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
