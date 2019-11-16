<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use Faker\Generator as Faker;
use Website\Models\Note;
use Website\Models\User;

$factory->define(Note::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'content' => $faker->realText(1000, 2),
        'datetime' => $faker->dateTimeBetween('-3 years', 'now')
    ];
});
