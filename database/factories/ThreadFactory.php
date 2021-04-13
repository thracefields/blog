<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Thread;
use App\User;
use App\ForumCategory;
use Faker\Generator as Faker;

$factory->define(Thread::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'user_id' => User::all()->random()->id,
        'category_id' => ForumCategory::all()->random()->id
    ];
});
