<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Posts;

$factory->define(Posts::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->text,
    ];
});
