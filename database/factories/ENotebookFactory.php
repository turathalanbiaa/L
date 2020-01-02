<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use App\Models\ENotebook;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(ENotebook::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'title' => $faker->realText(20, 2),
        'content' => $faker->realText(1000, 2),
        'created_at' => $faker->dateTimeBetween('-3 years', 'now')
    ];
});
