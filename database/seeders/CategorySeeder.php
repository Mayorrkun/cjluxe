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
            'category_name'=>'Sweaters'
        ]);
        Category::create([
            'category_name'=>'Hoodies'
        ]);
        Category::create([
            'category_name'=>'Shorts'
        ]);
        Category::create([
            'category_name'=>'Sets'
        ]);
        Category::create([
            'category_name'=>'Turtle Necks'
        ]);
        Category::create([
            'category_name'=>'Button-down Shirts'
        ]);
    }
}
