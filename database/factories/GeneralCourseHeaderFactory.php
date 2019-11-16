<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use Website\Models\GeneralCourseHeader;

$factory->define(GeneralCourseHeader::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->realText(1000,2)
    ];
});
