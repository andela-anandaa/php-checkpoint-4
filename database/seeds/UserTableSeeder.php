<?php

use Illuminate\Database\Seeder;

use KnowTube\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // a native user
        User::create([
            'name' => 'userone',
            'email' => 'userone@userone.com',
            'password' => bcrypt('userone'),
        ]);

        // a social user
        User::create([
            'name' => 'usertwo',
            'provider' => 'google',
            'provider_id' => str_random(32),
        ]);

        // a mix of users
        factory('KnowTube\User', 3)->create();
    }
}
