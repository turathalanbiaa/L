<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enum\Language;
use App\Enum\LecturerState;
use App\Models\Lecturer;
use Faker\Generator as Faker;

$factory->define(Lecturer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lang' => Language::getRandomLanguage(),
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'password' => md5($faker->password),
        'description' => $faker->randomElement([$faker->realText(500,2), null]),
        'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
        'last_login' => null,
        'state' => LecturerState::getRandomState(),
        'remember_token' => null
    ];
});
