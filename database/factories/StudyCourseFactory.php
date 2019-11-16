<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Enum\Level;
use Faker\Generator as Faker;
use Website\Models\Lecturer;
use Website\Models\StudyCourse;


$factory->define(StudyCourse::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'level' => Level::getRandomLevel(),
        'lecturer_id' => Lecturer::all()->random()->id,
        'description' => $faker->realText(1000,2)
    ];
});
