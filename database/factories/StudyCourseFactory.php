<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Enum\Language;
use App\Enum\Stage;
use App\Models\Lecturer;
use App\Models\StudyCourse;
use Faker\Generator as Faker;


$factory->define(StudyCourse::class, function (Faker $faker) {
    $lang = Language::getRandomLanguage();
    return [
        'name' => $faker->name,
        'lang' => $lang,
        'level' => Stage::getRandomLevel(),
        'lecturer_id' => Lecturer::where("lang",$lang)->get()->random()->id,
        'description' => $faker->realText(1000,2),
        'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
    ];
});
