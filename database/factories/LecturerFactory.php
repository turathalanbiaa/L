<?php

/** @var Factory $factory */

use App\Enum\LecturerState;
use App\Models\Lecturer;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Lecturer::class, function (Faker $faker) {
    return [
        "name"        => $faker->name,
        "email"       => $faker->email,
        "phone"       => $faker->phoneNumber,
        "password"    => md5($faker->password),
        "description" => $faker->randomElement(array(null, $faker->text)),
        "image"       => $faker->imageUrl(),
        "state"       => LecturerState::getRandomState(),
        "last_login"  => null,
        "token"       => null,
        "created_at"  => $faker->dateTimeBetween("-4 years", "-2 years"),
        "updated_at"  => $faker->dateTimeBetween("-1 years", "now")
    ];
});
