<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Enum\DocumentState;
use App\Enum\DocumentType;
use Faker\Generator as Faker;
use Website\Models\User;
use Website\Models\Document;

$factory->define(Document::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'image' => $faker->imageUrl(),
        'type' => DocumentType::getRandomType(),
        'state' => DocumentState::getRandomSate(),
    ];
});
