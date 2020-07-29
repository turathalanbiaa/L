<?php

namespace App\Http\Controllers\Api;

use App\Enum\Certificate;
use App\Enum\Gender;
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

            "Counties" => [
                "en" => Countries::keyValue("en"),
                "ar" => Countries::keyValue("ar")
            ]
        ]);
    }
}
