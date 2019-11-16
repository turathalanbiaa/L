<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Enum\ConvertUserState;
use Faker\Generator as Faker;
use Website\Models\ConvertUser;
use Website\Models\User;

$factory->define(ConvertUser::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'message' => $faker->realText(500,2),
        'state' => ConvertUserState::NOT_SEEN,
        'request_date' => $faker->dateTimeBetween('-3 years', 'now')
    ];
});
