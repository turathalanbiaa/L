<?php

/* @var $factory Factory */

use App\Enum\Country;
use App\Enum\Gender;
use App\Enum\Language;
use App\Enum\Stage;
use App\Enum\Certificate;
use App\Enum\UserType;
use App\Enum\UserState;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(User::class, function (Faker $faker) {
    $type = UserType::getRandomType();
    $lang = Language::getRandomLanguage();
    $stage = Stage::getRandomStage();
    $gender = Gender::getRandomGender();
    $country = Country::getRandomCountry();
    $certificate = Certificate::getRandomCertificate();
    $state = UserState::UNTRUSTED;

    return [
        'name' => $faker->name,
        'type' => $type,
        'lang' => $lang,
        'stage' => ($type==UserType::LISTENER)?null:$stage,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'password' => md5($faker->password),
        'gender' => $gender,
        'country' => $country,
        'image' => "user/default.png",
        'birth_date' => ($type==UserType::LISTENER)?null:$faker->date('Y-m-d','2000-01-01'),
        'address' => ($type==UserType::LISTENER)?null:$faker->address,
        'certificate' => ($type==UserType::LISTENER)?null:$certificate,
        'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
        'last_login' => null,
        'state' => $state,
        'remember_token' => null
    ];
});
