<?php

/** @var Factory $factory */

use App\Enum\CourseType;
use App\Models\Lecturer;
use App\Models\Lesson;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Lesson::class, function (Faker $faker) {
    return [
        "title"         => $faker->sentence(10),
        "description"   => $faker->randomElement(array(null, $faker->realText(1000))),
        "lecturer_id"   => $faker->numberBetween(1, 370),
        "course_id"     => $faker->numberBetween(1, 100),
        "type"          => CourseType::getRandomType(),
        "youtube_video" => "wDirpDqb4J0",
        "order"         => 0
    ];
});
