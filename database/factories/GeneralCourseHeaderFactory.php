<?php

/** @var Factory $factory */

use App\Models\GeneralCourseHeader;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(GeneralCourseHeader::class, function (Faker $faker) {
    return [
        "title"       => $faker->sentence,
        "description" => $faker->randomElement(array(null, $faker->text)),
        "details"     => $faker->randomElement(array(null, $faker->randomHtml())),
        "image"       => $faker->imageUrl(),
        "created_at"  => $faker->dateTimeBetween("-3 years", "now")
    ];
});
