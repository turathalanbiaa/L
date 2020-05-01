<?php

/** @var Factory $factory */

use App\Enum\CourseType;
use App\Enum\ReviewState;
use App\Models\Review;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Review::class, function (Faker $faker) {
    return [
        "user_id"    => User::all()->random()->id,
        "course_id"  => $faker->numberBetween(1, 100),
        "type"       => CourseType::getRandomType(),
        "rate"       => $faker->numberBetween(1, 5),
        "comment"    => $faker->sentence(10),
        "state"      => ReviewState::getRandomState(),
        "created_at" => $faker->dateTimeBetween("-3 years", "now")
    ];
});
