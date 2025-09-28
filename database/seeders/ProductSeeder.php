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

        $this->call(ShirtSeeder::class);
        $this->call(ShortSeeder::class);
        $this->call(AccessorySeeder::class);
    }
}
