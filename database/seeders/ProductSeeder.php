<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ProductImages;
use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //template
//        Products::create([
//            'product_name' => '',
//            'description' => '',
//            'quantity' => '',
//            'price' => '',
//            'discount' => '',
//            'sku' => '',
//            'category_id' => '',
//            'sold_out' => '',
//        ]);


        //images template
//        ProductImages::create([
//            'product_id' => '',
//            'img_src'  => ''
//        ]);


                Products::create([
            'product_name' => 'shirt black',
            'description' => 'A simple black T-Shirt ',
            'quantity' => 100,
            'price' => 10000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'T-shirts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('product_name', 'shirt black')->first()?->id,
            'img_src' => 'images/shirt3.png',
        ]);

    }
}
