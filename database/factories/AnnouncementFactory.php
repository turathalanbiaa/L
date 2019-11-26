<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Enum\AnnouncementState;
use App\Enum\AnnouncementType;
use App\Enum\Language;
use Faker\Generator as Faker;
use Website\Models\Announcement;

$factory->define(Announcement::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->realText(2000, 2),
        'lang' => Language::getRandomLanguage(),
        'image' => $faker->imageUrl(),
        'url' => $faker->url,
        'youtube_video_id' => "C4kxS1ksqtw",
        'type' => AnnouncementType::getRandomType(),
        'state' => AnnouncementState::getRandomState(),
        'publish_date' => $faker->dateTimeBetween('-3 years', 'now')
    ];
});
