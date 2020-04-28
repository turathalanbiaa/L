<?php

/** @var Factory $factory */

use App\Enum\Language;
use App\Models\GeneralCourse;
use App\Models\GeneralCourseHeader;
use App\Models\Lecturer;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(GeneralCourse::class, function (Faker $faker) {
    $lang = Language::getRandomLanguage();
    return [
        'name' => $faker->sentence,
        'lang' => $lang,
        'general_course_header_id' => $faker->randomElement([GeneralCourseHeader::where("lang", $lang)->get()->random()->id, null]),
        'lecturer_id' => Lecturer::where("lang", $lang)->get()->random()->id,
        'description' => $faker->randomElement([$faker->realText(500,2), null]),
        'created_at' => $faker->dateTimeBetween('-3 years', 'now')
    ];
});
