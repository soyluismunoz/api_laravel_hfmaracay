<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    $tittle = $faker->unique(4)->word(1);
    return [
        'name'=> $tittle,
        'slug'=> Str::slug($tittle),
    ];
});
