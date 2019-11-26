<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Enum\Language;
use Faker\Generator as Faker;
use Website\Models\GeneralCourse;
use Website\Models\GeneralCourseHeader;
use Website\Models\Lecturer;

$factory->define(GeneralCourse::class, function (Faker $faker) {
    $lang = Language::getRandomLanguage();
    return [
        'name' => $faker->name,
        'lang' => $lang,
        'general_course_header_id' => GeneralCourseHeader::where("lang",$lang)->get()->random()->id,
        'lecturer_id' => Lecturer::where("lang",$lang)->get()->random()->id,
        'description' => $faker->realText(1000,2)
    ];
});
