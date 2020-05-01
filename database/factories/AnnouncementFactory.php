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
        "image"         => $faker->randomElement(array(null, "public/announcement/wGOimJMU9weZU9Y7CJh3aPA46eEG8IzgOKsMnP2M.png", "public/announcement/Z8sFOmJcMP6VLrGOoYGV1mVBDY5M9LvgEPiOY9pK.jpeg")),
        "youtube_video" => $faker->randomElement(array(null, "C4kxS1ksqtw", "jbYBUXd0Otw")),
        "type"          => AnnouncementType::getRandomType(),
        "state"         => AnnouncementState::getRandomState(),
        "created_at"    => $faker->dateTimeBetween("-3 years", "now")
    ];
});
