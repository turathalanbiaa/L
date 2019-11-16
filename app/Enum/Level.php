<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/20/2019
 * Time: 5:44 PM
 */

namespace App\Enum;


class Level
{
    const BEGINNER = 1;
    const INTRO_FIRST_PART_ONE = 2;
    const INTRO_FIRST_PART_TWO = 3;
    const INTRO_SECOND_PART_ONE = 4;
    const INTRO_SECOND_PART_TWO = 5;
    const INTRO_THIRD_PART_ONE = 6;
    const INTRO_THIRD_PART_TWO = 7;


    /**
     * @param $levelNumber
     * @return string
     */
    public static function getLevelName($levelNumber)
    {
        switch ($levelNumber)
        {
            case self::BEGINNER:              return "المرحلة التمهيدية";                       break;
            case self::INTRO_FIRST_PART_ONE:  return "المقدمات المرحلة الأولى المستوى الأول";     break;
            case self::INTRO_FIRST_PART_TWO:  return "المقدمات المرحلة الأولى المستوى الثاني";   break;
            case self::INTRO_SECOND_PART_ONE: return "المقدمات المرحلة الثانية المستوى الأول";   break;
            case self::INTRO_SECOND_PART_TWO: return "المقدمات المرحلة الثانية المستوى الثاني"; break;
            case self::INTRO_THIRD_PART_ONE:  return "المقدمات المرحلة الثالثة المستوى الأول";   break;
            case self::INTRO_THIRD_PART_TWO:  return "المقدمات المرحلة الثالثة المستوى الثاني"; break;
        }

        return "Nothing";
    }

    /**
     * @return int
     */
    public static function getRandomLevel()
    {
       $arrayLevelList = array(self::BEGINNER, self::INTRO_FIRST_PART_ONE, self::INTRO_FIRST_PART_TWO, self::INTRO_SECOND_PART_ONE, self::INTRO_SECOND_PART_TWO, self::INTRO_THIRD_PART_ONE, self::INTRO_THIRD_PART_TWO);
       return (integer)$arrayLevelList[array_rand($arrayLevelList)];
    }
}