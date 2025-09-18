<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ProductImages;
use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShirtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        //shirts
        //high hopes big dreams
        Products::create([
            'product_name' => 'Hopes and Dreams',
            'description' => 'Hopes and Dreams T-shirt(Black), Made of cotton.',
            'quantity' => 100,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'T-shirts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'Hopes and Dreams T-shirt(Black), Made of cotton.')->first()?->id,
            'img_src' => 'images/shirts/shirt1.png',
        ]);

        Products::create([
            'product_name' => 'Hopes and Dreams',
            'description' => 'Hopes and Dreams T-shirt(White), Made of cotton.',
            'quantity' => 100,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'T-shirts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'Hopes and Dreams T-shirt(White), Made of cotton.')->first()?->id,
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

        //Active
        Products::create([
            'product_name' => 'Active CL',
            'description' => 'Active CL T-shirt(White), Made of cotton.',
            'quantity' => 100,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'T-shirts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'Active CL T-shirt(White), Made of cotton.')->first()?->id,
            'img_src' => 'images/shirts/shirt6-front.png',
        ]);
        ProductImages::create([
            'product_id' => Products::where('description', 'Active CL T-shirt(White), Made of cotton.')->first()?->id,
            'img_src' => 'images/shirts/shirt6-back.png',
        ]);
        // No evil
        Products::create([
            'product_name' => 'No Evil',
            'description' => 'No Evil T-shirt(Black), Made of cotton.',
            'quantity' => 100,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'T-shirts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'No Evil T-shirt(Black), Made of cotton.')->first()?->id,
            'img_src' => 'images/shirts/shirt10.png',
        ]);

        Products::create([
            'product_name' => 'No Evil',
            'description' => 'No Evil T-shirt(White), Made of cotton.',
            'quantity' => 100,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'T-shirts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'No Evil T-shirt(White), Made of cotton.')->first()?->id,
            'img_src' => 'images/shirts/shirt9.png',
        ]);

        //Rachnid
        Products::create([
            'product_name' => 'Rachnid',
            'description' => 'Rachnid T-shirt(Black), Made of cotton.',
            'quantity' => 100,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'T-shirts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'Rachnid T-shirt(Black), Made of cotton.')->first()?->id,
            'img_src' => 'images/shirts/shirt7.png',
        ]);

        Products::create([
            'product_name' => 'Rachnid',
            'description' => 'Rachnid T-shirt(White), Made of cotton.',
            'quantity' => 100,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'T-shirts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'Rachnid T-shirt(White), Made of cotton.')->first()?->id,
            'img_src' => 'images/shirts/shirt8.png',
        ]);
        //keep grinding
        Products::create([
            'product_name' => 'Keep Grinding',
            'description' => 'Keep Grinding T-shirt(White), Made of cotton.',
            'quantity' => 100,
            'price' => 30000,
            'discount' => 0,
            'category_id' => Category::where('category_name', 'T-shirts')->first()->id,
            'sold_out' => false,
        ]);

        ProductImages::create([
            'product_id' => Products::where('description', 'Keep Grinding T-shirt(White), Made of cotton.')->first()?->id,
            'img_src' => 'images/shirts/shirt5.png',
        ]);
    }
}
