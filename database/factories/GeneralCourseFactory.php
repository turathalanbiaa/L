<?php

/** @var Factory $factory */

use App\Enum\CourseState;
use App\Enum\Language;
use App\Models\GeneralCourse;
use App\Models\GeneralCourseHeader;
use App\Models\Lecturer;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(GeneralCourse::class, function (Faker $faker) {
    return [
        "name"                     => $faker->sentence,
        "lang"                     => Language::getRandomLanguage(),
        "description"              => $faker->randomElement(array(null, $faker->text)),
        "image"                    => $faker->imageUrl(),
        "state"                    => CourseState::getRandomState(),
        "general_course_header_id" => $faker->randomElement(array(null, GeneralCourseHeader::all()->random()->id)),
        "lecturer_id"              => Lecturer::all()->random()->id,
        "created_at"               => $faker->dateTimeBetween("-4 years", "-2 years"),
        "updated_at"               => $faker->dateTimeBetween("-1 years", "now")
    ];
});
