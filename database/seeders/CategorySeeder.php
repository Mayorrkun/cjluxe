<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::create([
            'category_name'=>'T-shirts'
        ]);
        Category::create([
            'category_name'=>'Accessories'
        ]);
        Category::create([
            'category_name'=>'Shorts'
        ]);
        Category::create([
            'category_name'=>'Sets'
        ]);
    }
}
