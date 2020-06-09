<?php

/** @var Factory $factory */

use App\Enum\Language;
use App\Enum\LecturerState;
use App\Models\Lecturer;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Lecturer::class, function (Faker $faker) {
    return [
        "name"           => $faker->name,
        "email"          => $faker->email,
        "phone"          => $faker->phoneNumber,
        "password"       => md5($faker->password),
        "description"    => $faker->randomElement(array(null, $faker->realText(1000))),
        "image"          => $faker->randomElement(array(null, $faker->imageUrl())),
        "created_at"     => $faker->dateTimeBetween("-3 years", "now"),
        "last_login"     => null,
        "state"          => LecturerState::getRandomState(),
        "remember_token" => null
    ];
});
