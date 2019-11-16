<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Enum\IssueType;
use Faker\Generator as Faker;
use Website\Models\Issue;

$factory->define(Issue::class, function (Faker $faker) {
    return [
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'title' => $faker->title,
        'content' => $faker->realText(1000, 2),
        'type' => IssueType::getRandomType(),
        'datetime' => $faker->dateTimeBetween('-3 years', 'now')
    ];
});
