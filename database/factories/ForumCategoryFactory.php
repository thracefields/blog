<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ForumCategory;
use Faker\Generator as Faker;

$factory->define(ForumCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->word
    ];
});
