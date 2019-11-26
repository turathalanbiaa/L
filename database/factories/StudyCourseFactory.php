<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Enum\Language;
use App\Enum\Level;
use Faker\Generator as Faker;
use Website\Models\Lecturer;
use Website\Models\StudyCourse;


$factory->define(StudyCourse::class, function (Faker $faker) {
    $lang = Language::getRandomLanguage();
    return [
        'name' => $faker->name,
        'lang' => $lang,
        'level' => Level::getRandomLevel(),
        'lecturer_id' => Lecturer::where("lang",$lang)->get()->random()->id,
        'description' => $faker->realText(1000,2)
    ];
});
