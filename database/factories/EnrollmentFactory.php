<?php

/** @var Factory $factory */

use App\Enum\EnrollmentState;
use App\Models\Enrollment;
use App\Models\GeneralCourse;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Enrollment::class, function (Faker $faker) {
    return [
        "user_id"           => User::all()->random()->id,
        "general_course_id" => GeneralCourse::all()->random()->id,
        "state"             => EnrollmentState::getRandomState(),
        "created_at"        => $faker->dateTimeBetween("-3 years", "now")
    ];
});
