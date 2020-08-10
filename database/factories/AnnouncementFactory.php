<?php

/* @var $factory Factory */

use App\Enum\AnnouncementState;
use App\Enum\AnnouncementType;
use App\Enum\Language;
use App\Models\Announcement;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Announcement::class, function (Faker $faker) {
    return [
        "lang"          => Language::getRandomLanguage(),
        "title"         => $faker->sentence(10),
        "description"   => $faker->randomElement(array(null, $faker->realText(1000))),
        "image"         => $faker->randomElement(array(null, $faker->imageUrl())),
        "youtube_video" => $faker->randomElement(array(null, "C4kxS1ksqtw", "jbYBUXd0Otw")),
        "type"          => AnnouncementType::getRandomType(),
        "state"         => AnnouncementState::getRandomState(),
        "created_at"     => $faker->dateTimeBetween("-4 years", "-2 years"),
        "updated_at"     => $faker->dateTimeBetween("-1 years", "now")
    ];
});
