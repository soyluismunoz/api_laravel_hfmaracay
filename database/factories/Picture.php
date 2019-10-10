<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence,
        'path' => '/uploads/'.$faker->year.'/'.$faker->month.'/',
        'filename' => substr($faker->md5, 0, 5).'.jpg',
    ];
});
