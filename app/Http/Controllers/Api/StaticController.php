<?php

namespace App\Http\Controllers\Api;

use App\Enum\Certificate;
use App\Enum\Gender;
use App\Enum\Stage;
use App\Http\Controllers\Controller;
use PeterColes\Countries\CountriesFacade as Countries;

class StaticController extends Controller
{
    public function index()
    {
        return response()->json([
            "Genders" => [
                "en" => ["MALE" => Gender::MALE, "FEMALE" => Gender::FEMALE],
                "ar" => ["ذكر" => Gender::MALE, "انثى" => Gender::FEMALE],
            ],

            "Certificates" => [
                "en" => ["RELIGION" => Certificate::RELIGION, "INTERMEDIATE_SCHOOL" => Certificate::INTERMEDIATE_SCHOOL, "HIGH_SCHOOL" => Certificate::HIGH_SCHOOL, "DIPLOMA" => Certificate::DIPLOMA, "BACHELORS" => Certificate::BACHELORS, "MASTER" => Certificate::MASTER, "PHD" => Certificate::PHD, "OTHER" => Certificate::OTHER],
                "ar" => ["حوزوي" => Certificate::RELIGION, "المدرسة المتوسطة" => Certificate::INTERMEDIATE_SCHOOL, "المدرسة الثانوية" => Certificate::HIGH_SCHOOL, "دبلوم" => Certificate::DIPLOMA, "بكالوريوس" => Certificate::BACHELORS, "ماجستير" => Certificate::MASTER, "دكتوراه" => Certificate::PHD, "اخرى" => Certificate::OTHER]
            ],

            "Stage" => [
                "ar" => [
                    "المرحلة التمهيدية"                       => 1,
                    "المقدمات المرحلة الأولى المستوى الأول"     => 2,
                    "المقدمات المرحلة الأولى المستوى الثاني"   => 3,
                    "المقدمات المرحلة الثانية المستوى الأول"   => 4,
                    "المقدمات المرحلة الثانية المستوى الثاني" => 5,
                    "المقدمات المرحلة الثالثة المستوى الأول"   => 6,
                    "المقدمات المرحلة الثالثة المستوى الثاني" => 7
                ],
                "en" => [
                    "Beginner Stage" => 1,
                    "Introductions First Stage Level One"  => 2,
                    "Introductions First Stage Level Two"  => 3,
                    "Introductions Second Stage Level One" => 4,
                    "Introductions Second Stage Level Two" => 5,
                    "Introductions Third Stage Level One"  => 6,
                    "Introductions Third Stage Level Two"  => 7
                ]
            ],

            "Counties" => [
                "en" => Countries::keyValue("en"),
                "ar" => Countries::keyValue("ar")
            ]
        ]);
    }
}
