<?php

/** @var Factory $factory */

use App\Models\Timetable;
use App\Models\WatchedTimetable;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(WatchedTimetable::class, function (Faker $faker) {
    return [
        "user_id"      => $faker->numberBetween(1, 1839),
        "timetable_id" => Timetable::all()->random()->id
    ];
});
