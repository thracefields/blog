<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'subtitle' => $faker->sentence,
        'content' => $faker->paragraph(10),
        'published_at' => Carbon::now(),
        'category_id' => function(){
            return factory('App\Category')->create()->id;
        },
    ];
});
