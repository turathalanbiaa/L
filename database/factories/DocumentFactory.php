<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Enum\DocumentState;
use App\Enum\DocumentType;
use App\Models\Document;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Document::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'image' => $faker->imageUrl(),
        'type' => DocumentType::getRandomType(),
        'state' => DocumentState::getRandomSate(),
    ];
});
