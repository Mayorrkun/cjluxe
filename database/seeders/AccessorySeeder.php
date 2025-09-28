<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ProductImages;
use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Embers Black
        Products::create([
            'product_name' => 'Embers Black',
            'description' => 'Embers Black Face Cap',
            'quantity' =>20,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'Accessories')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'Embers Black Face Cap')->first()?->id,
            'img_src' => 'images/caps/cap1.png',
        ]);

        //Embers Pink
        Products::create([
            'product_name' => 'Embers Pink',
            'description' => 'Embers Pink Face Cap',
            'quantity' =>20,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'Accessories')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'Embers Pink Face Cap')->first()?->id,
            'img_src' => 'images/caps/cap2.png',
        ]);
        //Embers Red
        Products::create([
            'product_name' => 'Embers Red',
            'description' => 'Embers Red Face Cap',
            'quantity' =>20,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'Accessories')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'Embers Red Face Cap')->first()?->id,
            'img_src' => 'images/caps/cap3.png',
        ]);

    }
}
