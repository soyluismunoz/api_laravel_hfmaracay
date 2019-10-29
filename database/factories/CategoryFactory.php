<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $tittle = $faker->sentence(1);
    return [
        'name'          => $tittle,  
        'description'   => $faker->text(20),
        'slug'          => Str::slug($tittle),
    ];
});
