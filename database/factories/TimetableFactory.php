<?php

/** @var Factory $factory */

use App\Enum\CourseType;
use App\Enum\Stage;
use App\Models\Lesson;
use App\Models\Timetable;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Timetable::class, function (Faker $faker) {
    return [
        "lesson_id"    => Lesson::where("course_type", CourseType::STUDY)->get()->random()->id,
        "stage"        => Stage::getRandomStage(),
        "publish_date" => $faker->dateTimeBetween("-4 weeks", "+4 weeks")
    ];
});
