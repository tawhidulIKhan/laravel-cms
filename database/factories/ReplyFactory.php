<?php

use App\Post;
use App\User;
use App\Reply;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraph,
        'post_id' => Post::all()->random(),
        'user_id' => User::all()->random()
    ];
});
