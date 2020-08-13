<?php

/* @var $factory Factory */

use App\Enum\Gender;
use App\Enum\Stage;
use App\Enum\Certificate;
use App\Enum\UserType;
use App\Enum\UserState;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(User::class, function (Faker $faker) {
    $type = UserType::getRandomType();

    return [
        "name"        => $faker->name,
        "type"        => $type,
        "lang"        => app()->getLocale(),
        "stage"       => ($type == UserType::STUDENT) ? Stage::getRandomStage() : null,
        "email"       => $faker->unique()->email,
        "phone"       => $faker->unique()->phoneNumber,
        "password"    => $faker->md5,
        "gender"      => Gender::getRandomGender(),
        "country"     => $faker->countryCode,
        "birth_date"  => ($type == UserType::STUDENT) ? $faker->date("Y-m-d","2002-01-01") : null,
        "address"     => ($type == UserType::STUDENT) ? $faker->address : null,
        "certificate" => ($type == UserType::STUDENT) ? Certificate::getRandomCertificate() : null,
        "state"       => UserState::getRandomState(),
        "last_login"  => null,
        "token"       => null,
        "created_at"  => $faker->dateTimeBetween("-4 years", "-2 years"),
        "updated_at"  => $faker->dateTimeBetween("-1 years", "now")
    ];
});
