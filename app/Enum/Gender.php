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

    public static function getList()
    {
        return [
            self::MALE,
            self::FEMALE
        ];
    }

    /**
     * @param $genderNumber
     * @return string
     */
    public static function getGenderName($genderNumber)
    {
        switch ($genderNumber)
        {
            case self::MALE:   return "ذكر";  break;
            case self::FEMALE: return "انثى"; break;
        }

        return "";
    }

    /**
     * @return int
     */
    public static function getRandomGender()
    {
        $arrayGenderList = array(
            self::MALE,
            self::FEMALE);

        return (integer)$arrayGenderList[array_rand($arrayGenderList)];
    }
}
