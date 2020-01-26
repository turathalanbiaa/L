<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Enum\Language;
use App\Models\GeneralCourseHeader;
use Faker\Generator as Faker;

$factory->define(GeneralCourseHeader::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'lang' => Language::getRandomLanguage(),
        'description' => $faker->realText(1000,2),
        'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
    ];
});
