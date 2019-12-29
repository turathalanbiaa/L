<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Enum\Country;
use App\Enum\Gender;
use App\Enum\Language;
use App\Enum\Level;
use App\Enum\ScientificDegree;
use App\Enum\UserType;
use App\Enum\VerifyState;
use Faker\Generator as Faker;
use Website\Models\User;

$factory->define(User::class, function (Faker $faker) {
    $type = UserType::getRandomType();
    return [
        'name' => $faker->name,
        'type' => $type,
        'lang' => Language::getRandomLanguage(),
        'level' => ($type==UserType::LISTENER)?null:Level::getRandomLevel(),
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'password' => md5($faker->password),
        'gender' => Gender::getRandomGender(),
        'country' => Country::getRandomCountry(),
        'image' => $faker->imageUrl(),
        'birthdate' => ($type==UserType::LISTENER)?null:$faker->date('Y-m-d','2000-01-01'),
        'address' => ($type==UserType::LISTENER)?null:$faker->address,
        'scientific_degree' => ($type==UserType::LISTENER)?null:ScientificDegree::getRandomScientificDegree(),
        'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
        'last_login_date' => null,
        'verify_state' => VerifyState::NOT_ACTIVE,
        'remember_token' => null
    ];
});
