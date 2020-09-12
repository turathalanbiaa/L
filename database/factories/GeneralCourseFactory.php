<?php

/** @var Factory $factory */

use App\Enum\CourseState;
use App\Enum\Language;
use App\Models\GeneralCourse;
use App\Models\GeneralCourseHeader;
use App\Models\Lecturer;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(GeneralCourse::class, function (Faker $faker) {
    return [
        "name"                     => $faker->sentence,
        "lang"                     => app()->getLocale(),
        "description"              => $faker->optional(0.7)->realText(),
        "image"                    => $faker->randomElement(GCImages()),
        "state"                    => CourseState::getRandomState(),
        "general_course_header_id" => $faker->randomElement(array(null, GeneralCourseHeader::all()->random()->id)),
        "lecturer_id"              => Lecturer::all()->random()->id,
        "created_at"               => $faker->dateTimeBetween("-4 years", "-2 years"),
        "updated_at"               => $faker->dateTimeBetween("-1 years", "now")
    ];
});

function GCImages() {
    return array(
        "public/generalcourse/1ol154ItmnvTUwscSfB1Af1kcjMVUJ99kf4lMrOb.png",
        "public/generalcourse/1WCpqH7q68tg1kK4257OI3iO84Z1VfcizgnSUKAn.jpeg",
        "public/generalcourse/98vkggbU3xJJmfMX6xbOA5AvgZON3TZerJwRL7zZ.jpeg",
        "public/generalcourse/AlQKSZSUzc4tJIBH8F6W07YJmyWBEh0x25Bkwcnz.jpeg",
        "public/generalcourse/5lUTHaJvY1hxa523v9rxPQpSiTICUWtwMvpdysWJ.jpeg",
        "public/generalcourse/LJnDVCGcWy5IcD8Vy8MSsblV2Lcuqg8F1ji5Yyjs.jpeg"
    );
}
