<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 5 ; $i++) {

            if($i == 1 || $i == 5){
                $category = Category::find($i);
                $category->blogs_number = 2;
                $category->save();
            }
        }
    }
}
