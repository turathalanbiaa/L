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
        'lang' => Language::getRandomLanguage(),
        'title' => $faker->sentence(12),
        'content' => $faker->randomElement(array(null, $faker->realText(2000, 2))),
        'image' => $faker->randomElement(array(null, $faker->imageUrl())),
        'url' => $faker->randomElement(array(null, $faker->url)),
        'youtube_video_id' => $faker->randomElement(array(null, "C4kxS1ksqtw")),
        'type' => AnnouncementType::getRandomType(),
        'state' => AnnouncementState::getRandomState(),
        'created_at' => $faker->dateTimeBetween('-3 years', 'now')
    ];
});
