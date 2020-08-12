<?php

/** @var Factory $factory */

use App\Enum\CourseType;
use App\Models\GeneralCourse;
use App\Models\Lecturer;
use App\Models\Lesson;
use App\Models\StudyCourse;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Lesson::class, function (Faker $faker) {
    $courseType = CourseType::getRandomType();
    return [
        "title"         => $faker->sentence(10),
        "description"   => $faker->randomElement(array(null, $faker->text)),
        "youtube_video" => "wDirpDqb4J0",
        "video_length"  => $faker->time(),
        "order"         => $faker->numberBetween(1, 100),
        "seen"          => $faker->numberBetween(1, 1000),
        "lecturer_id"   => Lecturer::all()->random()->id,
        "course_id"     => ($courseType == CourseType::GENERAL)
            ? GeneralCourse::all()->random()->id
            : StudyCourse::all()->random()->id,
        "course_type"   => $courseType
    ];
});
