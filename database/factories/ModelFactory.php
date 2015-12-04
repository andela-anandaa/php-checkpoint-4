<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(KnowTube\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(KnowTube\Resource::class, function (Faker\Generator $faker) {
    $keys = [
        'NzM-ISzpkPo',
        'bK27ldqmSMs',
        'bvlolmFX-rc',
        'wqH9KX9o0vg',
        '9-603kcKyMI',
        'tAlcZfF3YrU',
        'xnv__ogkt0M',
        'DoMRLZvBtXU',
        'Lyw5bf-Fers',
        '3pAnRKD4raY'
    ];

    $chosen = $faker->randomElement($keys);

    return [
        'title' => $faker->sentence,
        'url' => "https://www.youtube.com/embed/{$chosen}",
        'description' => $faker->paragraph,
    ];
});

$factory->define(KnowTube\Category::class, function (Faker\Generator $faker) {
    $randrom_id = str_random(11);
    return [
        'title' => $faker->word,
    ];
});
