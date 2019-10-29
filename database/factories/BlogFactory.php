<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    $tittle = $faker->sentence(3);
    return [
        'user_id'       => rand(1, 30),
    	'category_id'   => rand(1, 40),
        'title'         => $tittle,
        'slug'          => Str::slug($tittle),
        'featured_img'  => $faker->imageUrl($width=1500, $height=900),
        'body'          => $faker->text(500),
        'excerpt'       => $faker->text(30),
    ];
});
