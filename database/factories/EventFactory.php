<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'date' => $faker->dateTime,
        'address' => $faker->address,
        'description' => $faker->optional()->sentence,
    ];
});
