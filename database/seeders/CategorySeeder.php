<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'          => Str::upper('Chocolate'),
            'slug'          => Str::slug('chocolate'),
            'thumbnail'     => 'chocolate.webp',
        ]);

        Category::create([
            'name'          => Str::upper('Bubble Gum'),
            'slug'          => Str::slug('bubble_gum'),
            'thumbnail'     => 'bubble_gum.webp',
        ]);
    }
}
