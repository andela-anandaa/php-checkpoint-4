<?php

use Illuminate\Database\Seeder;
use KnowTube\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title' => 'science',
        ]);

        Category::create([
            'title' => 'history',
        ]);

        Category::create([
            'title' => 'mathematics',
        ]);

        Category::create([
            'title' => 'art',
        ]);
    }
}
