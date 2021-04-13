<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reply;
use App\Thread;
use App\User;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'thread_id' => Thread::all()->random()->id,
        'user_id' => User::all()->random()->id,
        'body' => $faker->paragraph,
    ];
});
