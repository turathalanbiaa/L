<?php

/* @var $factory Factory */

use App\Enum\Gender;
use App\Enum\Language;
use App\Enum\Stage;
use App\Enum\Certificate;
use App\Enum\UserType;
use App\Enum\UserState;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use PeterColes\Countries\CountriesFacade as Countries;

$factory->define(User::class, function (Faker $faker) {
    $type = UserType::getRandomType();
    return [
        "name"        => $faker->name,
        "type"        => $type,
        "lang"        => Language::getRandomLanguage(),
        "stage"       => ($type == UserType::STUDENT) ? Stage::getRandomStage() : null,
        "email"       => $faker->email,
        "phone"       => $faker->phoneNumber,
        "password"    => md5($faker->password),
        "gender"      => Gender::getRandomGender(),
        "country"     => array_rand((Countries::lookup(app()->getLocale()))->toArray()),
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
