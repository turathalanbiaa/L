<?php

/** @var Factory $factory */

use App\Models\Lesson;
use App\Models\User;
use App\Models\WatchLaterLesson;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(WatchLaterLesson::class, function (Faker $faker) {
    return [
        "user_id"   => $faker->numberBetween(1, 1839),
        "lesson_id" => $faker->numberBetween(1, 5000)
    ];
});
