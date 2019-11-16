<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use Website\Models\GeneralCourse;
use Website\Models\GeneralCourseHeader;
use Website\Models\Lecturer;

$factory->define(GeneralCourse::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'general_course_header_id' => GeneralCourseHeader::all()->random()->id,
        'lecturer_id' => Lecturer::all()->random()->id,
        'description' => $faker->realText(1000,2)
    ];
});
