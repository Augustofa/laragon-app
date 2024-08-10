<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::all()->first();
        Product::create([
            'name' => 'Produto A',
            'description' => 'Descrição do produto A',
            'price' => 15.63,
            'stock' => 12,
            'category_id' => $category->id,

        ]);

        Product::create([
            'name' => 'Produto B',
            'description' => 'Descrição do produto B',
            'price' => 23.22,
            'stock' => 15,
            'category_id' => $category->id,

        ]);
    }
}
