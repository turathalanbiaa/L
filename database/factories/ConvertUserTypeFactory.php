<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Enum\ConvertUserTypeState;
use Faker\Generator as Faker;
use Website\Models\ConvertUserType;
use Website\Models\User;

$factory->define(ConvertUserType::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'message' => $faker->realText(500,2),
        'state' => ConvertUserTypeState::NOT_ACTIVE,
        'request_date' => $faker->dateTimeBetween('-3 years', 'now')
    ];
});
