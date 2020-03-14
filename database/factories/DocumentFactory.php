<?php

/* @var $factory Factory */

use App\Enum\DocumentState;
use App\Enum\DocumentType;
use App\Enum\UserType;
use App\Models\Document;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Document::class, function (Faker $faker) {
    return [
        'user_id'    => User::where('type', UserType::STUDENT)->get()->random()->id,
        'image'      => $faker->imageUrl(),
        'type'       => DocumentType::getRandomType(),
        'state'      => DocumentState::getRandomState(),
        'created_at' => date('Y-m-d')
    ];
});
