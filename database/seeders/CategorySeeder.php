<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableforeignKeyConstraints();

        $data = [
            'romance', 'horror', 'drama', 'action', 'comedy', 'fantasy', 'fiction', 'mystery'
        ];

        foreach ($data as $category) {
            Category::insert([
                'name' => $category
            ]);
        }
    }
}
