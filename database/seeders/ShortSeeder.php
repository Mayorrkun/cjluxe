<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ProductImages;
use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //webstorm blue
        Products::create([
            'product_name' => 'Webstorm Blue',
            'description' => 'Webstorm Blue Shorts',
            'quantity' => 20,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'Shorts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'Webstorm Blue Shorts')->first()?->id,
            'img_src' => 'images/shorts/shorts1.png',
        ]);

        //webstorm black
        Products::create([
            'product_name' => 'Webstorm Black',
            'description' => 'Webstorm Black Shorts',
            'quantity' => 20,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'Shorts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'Webstorm Black Shorts')->first()?->id,
            'img_src' => 'images/shorts/shorts2.png',
        ]);
        //webstorm green
        Products::create([
            'product_name' => 'Webstorm Green',
            'description' => 'Webstorm Green Shorts',
            'quantity' => 20,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'Shorts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'Webstorm Green Shorts')->first()?->id,
            'img_src' => 'images/shorts/shorts3.png',
        ]);
        //webstorm purple
        Products::create([
            'product_name' => 'Webstorm Purple',
            'description' => 'Webstorm Purple Shorts',
            'quantity' => 20,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'Shorts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'Webstorm Purple Shorts')->first()?->id,
            'img_src' => 'images/shorts/shorts4.png',
        ]);
        //Phantom Threads
        Products::create([
            'product_name' => 'Phantom Threads',
            'description' => 'Phantom Threads Shorts',
            'quantity' => 20,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'Shorts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'Phantom Threads Shorts')->first()?->id,
            'img_src' => 'images/shorts/shorts5.png',
        ]);


        // CJLavish

        Products::create([
            'product_name' => 'CJLavish',
            'description' => 'CJLavish Shorts',
            'quantity' => 20,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'Shorts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'CJLavish Shorts')->first()?->id,
            'img_src' => 'images/shorts/shorts6.png',
        ]);

    }
}
