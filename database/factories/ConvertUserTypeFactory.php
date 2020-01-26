<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Enum\ConvertUserTypeState;
use App\Models\ConvertUserType;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(ConvertUserType::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'message' => $faker->realText(500,2),
        'state' => ConvertUserTypeState::NOT_ACTIVE,
        'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
    ];
});
