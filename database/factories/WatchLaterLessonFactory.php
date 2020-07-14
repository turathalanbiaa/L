<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Lesson;
use App\Models\User;
use App\Models\WatchLaterLesson;
use Faker\Generator as Faker;

$factory->define(WatchLaterLesson::class, function (Faker $faker) {
    return [
        "user_id" => User::all()->random()->id,
        "lesson_id" => Lesson::all()->random()->id
    ];
});
