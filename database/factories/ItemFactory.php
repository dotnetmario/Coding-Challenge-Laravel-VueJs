<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(rand(5, 10)),
        'image' => 'https://picsum.photos/500/500',
        'description' => $faker->sentence(rand(50, 100)),
    ];
});
