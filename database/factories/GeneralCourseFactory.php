<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Enum\Language;
use App\Models\GeneralCourse;
use App\Models\GeneralCourseHeader;
use App\Models\Lecturer;
use Faker\Generator as Faker;

$factory->define(GeneralCourse::class, function (Faker $faker) {
    $lang = Language::getRandomLanguage();
    return [
        'name' => $faker->name,
        'lang' => $lang,
        'general_course_header_id' => GeneralCourseHeader::where("lang",$lang)->get()->random()->id,
        'lecturer_id' => Lecturer::where("lang",$lang)->get()->random()->id,
        'description' => $faker->realText(1000,2),
        'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
    ];
});
