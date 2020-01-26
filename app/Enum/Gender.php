<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/20/2019
 * Time: 5:46 PM
 */

namespace App\Enum;


class Gender
{
    const MALE = 1;
    const FEMALE = 2;

    public static function getGenders()
    {
        return array(
            self::MALE,
            self::FEMALE
        );
    }

    public static function getGenderName($gender)
    {
        $locale = app()->getLocale();
        switch ($locale) {
            case Language::ARABIC:
                switch ($gender)
                {
                    case self::MALE:   return "ذكر";  break;
                    case self::FEMALE: return "انثى"; break;
                }
                break;
            case Language::ENGLISH:
                switch ($gender)
                {
                    case self::MALE:   return "Male";   break;
                    case self::FEMALE: return "Female"; break;
                }
                break;
        }

        return "";
    }

    public static function getRandomGender()
    {
        $genders = self::getGenders();
        return (integer)$genders[array_rand($genders)];
    }
}
