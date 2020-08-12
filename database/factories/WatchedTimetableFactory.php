<?php

/** @var Factory $factory */

use App\Enum\UserType;
use App\Models\Timetable;
use App\Models\User;
use App\Models\WatchedTimetable;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(WatchedTimetable::class, function (Faker $faker) {
    return [
        "user_id"      => User::where("type", UserType::STUDENT)->random()->id,
        "timetable_id" => Timetable::all()->random()->id
    ];
});
