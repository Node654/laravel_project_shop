<?php

namespace Database\Seeders;

use App\Models\Brand;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Brand::factory(5)->create();
        Product::factory(10)
            ->has(Category::factory(rand(1, 3)))
            ->create();
    }
}
