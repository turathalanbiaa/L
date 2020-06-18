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
    $lang = Language::getRandomLanguage();
    return [
        "name"                     => $faker->sentence,
        "lang"                     => $lang,
        "general_course_header_id" => $faker->randomElement(array(null, GeneralCourseHeader::all()->random()->id)),
        "lecturer_id"              => Lecturer::all()->random()->id,
        "description"              => $faker->randomElement(array(null, $faker->text)),
        "details"                  => $faker->randomElement(array(null, $faker->randomHtml())),
        "image"                    => $faker->imageUrl(),
        "state"                    => CourseState::getRandomState(),
        "created_at"               => $faker->dateTimeBetween("-3 years", "now")
    ];
});
