<?php

/** @var Factory $factory */

use App\Enum\CourseState;
use App\Enum\Language;
use App\Enum\Stage;
use App\Models\Lecturer;
use App\Models\StudyCourse;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(StudyCourse::class, function (Faker $faker) {
    $lang = Language::getRandomLanguage();
    return [
        "name"        => $faker->sentence,
        "lang"        => $lang,
        "description" => $faker->randomElement(array(null, $faker->text)),
        "image"       => $faker->imageUrl(),
        "stage"       => Stage::getRandomStage(),
        "state"       => CourseState::getRandomState(),
        "lecturer_id" => Lecturer::all()->random()->id,
        "created_at"  => $faker->dateTimeBetween("-4 years", "-2 years"),
        "updated_at"  => $faker->dateTimeBetween("-1 years", "now")
    ];
});
