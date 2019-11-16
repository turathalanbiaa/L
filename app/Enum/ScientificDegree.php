<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/20/2019
 * Time: 5:52 PM
 */

namespace App\Enum;


class ScientificDegree
{
    const RELIGION = 1;
    const INTERMEDIATE_SCHOOL = 2;
    const HIGH_SCHOOL = 3;
    const DIPLOMA = 4;
    const BACHELORS = 5;
    const MASTER = 6;
    const PHD = 7;
    const OTHER = 8;

    /**
     * @return array
     */
    public static function getList()
    {
        return [
            self::RELIGION,
            self::INTERMEDIATE_SCHOOL,
            self::HIGH_SCHOOL,
            self::DIPLOMA,
            self::BACHELORS,
            self::MASTER,
            self::PHD,
            self::OTHER
        ];
    }

    /**
     * @param $scientificDegreeNumber
     * @return string
     */
    public static function getScientificDegreeName($scientificDegreeNumber)
    {
        switch ($scientificDegreeNumber)
        {
            case self::RELIGION:            return "حوزوي";       break;
            case self::INTERMEDIATE_SCHOOL: return "متوسطة";      break;
            case self::HIGH_SCHOOL:         return "أعدادية";     break;
            case self::DIPLOMA:             return "دبلوم";       break;
            case self::BACHELORS:           return "بكالوريوس";   break;
            case self::MASTER:              return "دراسات عليا"; break;
            case self::PHD:                 return "دكتوراه";     break;
            case self::OTHER:               return "أخرى";        break;
        }

        return "";
    }

    /**
     * @return int
     */
    public static function getRandomScientificDegree()
    {
        $arrayScientificDegree =  array(
            self::RELIGION,
            self::INTERMEDIATE_SCHOOL,
            self::HIGH_SCHOOL,
            self::DIPLOMA,
            self::BACHELORS,
            self::PHD,
            self::OTHER);

        return (integer)$arrayScientificDegree[array_rand($arrayScientificDegree)];
    }
}
