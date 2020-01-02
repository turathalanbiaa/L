<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Enum\Language;
use App\Models\Lecturer;
use Faker\Generator as Faker;

$factory->define(Lecturer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lang' => Language::getRandomLanguage(),
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'password' => md5($faker->password),
        'description' => $faker->realText(1000,2),
        'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
        'last_login_date' => null,
        'remember_token' => null
    ];
});
