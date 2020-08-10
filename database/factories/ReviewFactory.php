<?php

/** @var Factory $factory */

use App\Enum\CourseType;
use App\Enum\ReviewState;
use App\Models\GeneralCourse;
use App\Models\Review;
use App\Models\StudyCourse;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Review::class, function (Faker $faker) {
    $courseType = CourseType::getRandomType();
    return [
        "user_id"     => User::all()->random()->id,
        "course_id"   => ($courseType == CourseType::GENERAL)
            ? GeneralCourse::all()->random()->id
            : StudyCourse::all()->random()->id,
        "course_type" => $courseType,
        "rate"        => $faker->numberBetween(1, 5),
        "comment"     => $faker->sentence(10),
        "state"       => ReviewState::getRandomState(),
        "created_at"  => $faker->dateTimeBetween("-4 years", "-2 years"),
        "updated_at"  => $faker->dateTimeBetween("-1 years", "now")
    ];
});
