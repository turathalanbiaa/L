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
        "title"         => (app()->getLocale() == Language::ARABIC)
            ? $faker->randomElement(titles())
            : $faker->sentence(10),
        "lang"          => app()->getLocale(),
        "description"   => $faker->optional(0.7)->realText(),
        "image"         => $faker->optional(0.7)->randomElement(images()),
        "youtube_video" => $faker->optional(0.7)->randomElement(youtubeVideos()),
        "type"          => AnnouncementType::getRandomType(),
        "state"         => AnnouncementState::getRandomState(),
        "created_at"    => $faker->dateTimeBetween("-4 years", "-2 years"),
        "updated_at"    => $faker->dateTimeBetween("-1 years", "now")
    ];
});

function titles() {
    return array(
        "سيبدأ التسجيل عن قريب",
        "تم اعلان النتائج الامتحانية",
        "تم رفع دورة جديده للطلاب",
        "نعزي العالم الاسلامي والمرجعية العليا وطلابنا الاعزاء بذكرى استشهاد الامام الثالث الحسين (ع) بن علي بن ابي طالب (ع).",
        "يرجى اكمال رفع المستمسكات من قبل طلابنا",
        "سوف يتم توزيع الجوائز لمسابقة العاشقين الاسبوع القادم",
        "تعزية ...",
        "اعلان هام ..... متفائلون",
        "تهنئة .... الى طلابنا بالذكرى الرابعه للمعهد",
        "سوف يتم ايقاف الموقع مؤقتا بسبب الصسانة",
        "شكر وتقدير الى جميع كوادرنا من اساتذة وطلاب ...",
        "اعلان هام ..... عطلة رمضان قد بدأت لطلابنا"
    );
}

function youtubeVideos() {
    return array(
        "C4kxS1ksqtw",
        "jbYBUXd0Otw",
        "8946nVY1b-I",
        "IZiXzZUZb7o",
        "68gpVztEXxM",
        "aj93w21mUbQ"
    );
}

function images() {
    return array(
        "public/announcement/B7BHN0pHFUvyLq1KUeeKAYnE6pssUITwrm9g9pMZ.jpeg",
        "public/announcement/fFa6LGbDBB331CuhCg5na3dKgdEsNTZUzn7OrfXD.jpeg",
        "public/announcement/HYueJr238wRaoXGY7WYKpHyokhZ7c2VDOl9H01cG.jpeg",
        "public/announcement/KnaWS2VJN6zxaewGALt8rnqL8AvRYGma3UoiwQra.jpeg",
    );
}
