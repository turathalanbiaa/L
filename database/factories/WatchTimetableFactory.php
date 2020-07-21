<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Timetable;
use App\Models\WatchTimetable;
use Faker\Generator as Faker;

$factory->define(WatchTimetable::class, function (Faker $faker) {
    return [
        "user_id"      => $faker->numberBetween(1, 1839),
        "timetable_id" => Timetable::all()->random()->id
    ];
});
