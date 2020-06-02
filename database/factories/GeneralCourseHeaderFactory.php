<?php

/** @var Factory $factory */

use App\Enum\Language;
use App\Models\GeneralCourseHeader;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(GeneralCourseHeader::class, function (Faker $faker) {
    return [
        "title"       => $faker->sentence,
        "lang"        => Language::getRandomLanguage(),
        "description" => $faker->randomElement(array(null, $faker->realText(1000))),
        "created_at"  => $faker->dateTimeBetween("-3 years", "now")
    ];
});
