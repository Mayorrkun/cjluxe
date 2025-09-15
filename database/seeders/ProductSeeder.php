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


        //shirts
        //high hopes big dreams
                Products::create([
            'product_name' => 'High Hopes Big Dreams',
            'description' => 'High Hopes Big Dreams T-shirt(Black), Made of cotton.',
            'quantity' => 100,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'T-shirts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'High Hopes Big Dreams T-shirt(Black), Made of cotton.')->first()?->id,
            'img_src' => 'images/shirts/shirt1.png',
        ]);

        Products::create([
            'product_name' => 'High Hopes Big Dreams',
            'description' => 'High Hopes Big Dreams T-shirt(White), Made of cotton.',
            'quantity' => 100,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'T-shirts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'High Hopes Big Dreams T-shirt(White), Made of cotton.')->first()?->id,
            'img_src' => 'images/shirts/shirt4.png',
        ]);
        //stoned
        Products::create([
            'product_name' => 'Stoned',
            'description' => 'Stoned T-shirt(Black), Made of cotton.',
            'quantity' => 100,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'T-shirts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'Stoned T-shirt(Black), Made of cotton.')->first()?->id,
            'img_src' => 'images/shirts/shirt2.png',
        ]);


        Products::create([
            'product_name' => 'Stoned',
            'description' => 'Stoned T-shirt(White), Made of cotton.',
            'quantity' => 100,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'T-shirts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'Stoned T-shirt(White), Made of cotton.')->first()?->id,
            'img_src' => 'images/shirts/shirt3.png',
        ]);

        //lavish
        Products::create([
            'product_name' => 'Lavish',
            'description' => 'Lavish T-shirt(Black), Made of cotton.',
            'quantity' => 100,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'T-shirts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'Lavish T-shirt(Black), Made of cotton.')->first()?->id,
            'img_src' => 'images/shirts/shirt11.png',
        ]);

        Products::create([
            'product_name' => 'Lavish',
            'description' => 'Lavish T-shirt(White), Made of cotton.',
            'quantity' => 100,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'T-shirts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'Lavish T-shirt(White), Made of cotton.')->first()?->id,
            'img_src' => 'images/shirts/shirt12.png',
        ]);
    }
}
