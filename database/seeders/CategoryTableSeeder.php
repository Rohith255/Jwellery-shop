<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['ring','bangles','chain','earrings','coins','necklace'];
        foreach ($categories as $category){
            Category::create([
                'categories_name'=>$category
            ]);
        }
    }
}
