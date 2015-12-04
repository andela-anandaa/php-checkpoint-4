<?php

use Illuminate\Database\Seeder;

use KnowTube\Resource;
use KnowTube\User;
use KnowTube\Category;

class ResourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);

        if (!$user) {
            $user = factory('KnowTube\User')->create();
        }

        $category = Category::find(1);

        if (!$category) {
            $category = factory('KnowTube\Category')->create();
        }

        factory('KnowTube\Resource')->create([
            'title' => 'good ol rick',
            'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'user_id' => $user->id,
            'category_id' => $category->id
        ]);

        factory('KnowTube\Resource', 5)->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);
    }
}
