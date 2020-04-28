<?php

/** @var Factory $factory */

use App\Enum\Language;
use App\Enum\Stage;
use App\Models\Lecturer;
use App\Models\StudyCourse;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(StudyCourse::class, function (Faker $faker) {
    $lang = Language::getRandomLanguage();
    return [
        'name' => $faker->sentence,
        'lang' => $lang,
        'stage' => Stage::getRandomStage(),
        'lecturer_id' => Lecturer::where("lang", $lang)->get()->random()->id,
        'description' => $faker->randomElement([$faker->realText(500,2), null]),
        'created_at' => $faker->dateTimeBetween('-3 years', 'now')
    ];
});
