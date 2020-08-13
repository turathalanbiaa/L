<?php

/** @var Factory $factory */

use App\Enum\LecturerState;
use App\Models\Lecturer;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Lecturer::class, function (Faker $faker) {
    return [
        "name"        => $faker->name,
        "email"       => $faker->unique()->email,
        "phone"       => $faker->unique()->phoneNumber,
        "password"    => $faker->md5,
        "description" => $faker->optional(0.7)->realText(),
        "image"       => $faker->randomElement(lecturerImages()),
        "state"       => LecturerState::getRandomState(),
        "last_login"  => null,
        "token"       => null,
        "created_at"  => $faker->dateTimeBetween("-4 years", "-2 years"),
        "updated_at"  => $faker->dateTimeBetween("-1 years", "now")
    ];
});

function lecturerImages() {
    return array(
        "public/lecturer/1v6GBk4YlYH3NkyHvD7rNrgeH5cmTRoWMPfJIXTR.jpeg",
        "public/lecturer/4eElZGskRiNxZKvNA7vA7R45E9QD85eF4xwpDcjg.jpeg",
        "public/lecturer/rEH90seF9XziSgADInC1BYm0Sudb0NtFnf4CNmXK.jpeg",
        "public/lecturer/tJU81NDxagm8Ut9tbZtpgCfM1U4G9BDDsK287lad.jpeg"
    );
}
