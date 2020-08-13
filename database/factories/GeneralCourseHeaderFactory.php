<?php

/** @var Factory $factory */

use App\Enum\Language;
use App\Models\GeneralCourseHeader;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(GeneralCourseHeader::class, function (Faker $faker) {
    return [
        "title"       => (app()->getLocale() == Language::ARABIC)
            ? $faker->randomElement(GCHTitles())
            : $faker->sentence(5),
        "description" => $faker->optional(0.7)->realText(),
        "image"       => $faker->randomElement(GCHImages()),
        "created_at"  => $faker->dateTimeBetween("-4 years", "-2 years"),
        "updated_at"  => $faker->dateTimeBetween("-1 years", "now")
    ];
});

function GCHTitles() {
    return array(
        "دورة التل الزينبي",
        "دورة مناسك الحج",
        "دورة تعليم تلاوة القرآن",
        "دورة الحشد الشبابي",
        "دورة في الخمس والزكاة",
        "دورة رمضان 1441 هـ"
    );
}

function GCHImages() {
    return array(
        "public/generalcourseheader/1ol154ItmnvTUwscSfB1Af1kcjMVUJ99kf4lMrOb.png",
        "public/generalcourseheader/1WCpqH7q68tg1kK4257OI3iO84Z1VfcizgnSUKAn.jpeg",
        "public/generalcourseheader/98vkggbU3xJJmfMX6xbOA5AvgZON3TZerJwRL7zZ.jpeg",
        "public/generalcourseheader/AlQKSZSUzc4tJIBH8F6W07YJmyWBEh0x25Bkwcnz.jpeg",
        "public/generalcourseheader/5lUTHaJvY1hxa523v9rxPQpSiTICUWtwMvpdysWJ.jpeg",
        "public/generalcourseheader/LJnDVCGcWy5IcD8Vy8MSsblV2Lcuqg8F1ji5Yyjs.jpeg"
    );
}
