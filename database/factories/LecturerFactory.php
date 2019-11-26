<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Enum\Language;
use Faker\Generator as Faker;
use Website\Models\Lecturer;

$factory->define(Lecturer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lang' => Language::getRandomLanguage(),
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'password' => md5($faker->password),
        'description' => $faker->realText(1000,2),
        'created_date' => $faker->dateTimeBetween('-3 years', 'now'),
        'last_login_date' => null,
        'remember_token' => null
    ];
});
