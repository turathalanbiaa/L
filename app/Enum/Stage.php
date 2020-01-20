<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/20/2019
 * Time: 5:44 PM
 */

namespace App\Enum;


class Stage
{
    const BEGINNER_STAGE = 1;
    const INTRO_STAGE_FIRST_LEVEL_ONE = 2;
    const INTRO_STAGE_FIRST_LEVEL_TWO = 3;
    const INTRO_STAGE_SECOND_LEVEL_ONE = 4;
    const INTRO_STAGE_SECOND_LEVEL_TWO = 5;
    const INTRO_STAGE_THIRD_LEVEL_ONE = 6;
    const INTRO_STAGE_THIRD_LEVEL_TWO = 7;

    public static function getStageName($stage)
    {
        $locale = app()->getLocale();
        switch ($locale) {
            case Language::ARABIC:
                switch ($stage) {
                    case self::BEGINNER_STAGE:               return "المرحلة التمهيدية";                       break;
                    case self::INTRO_STAGE_FIRST_LEVEL_ONE:  return "المقدمات المرحلة الأولى المستوى الأول";     break;
                    case self::INTRO_STAGE_FIRST_LEVEL_TWO:  return "المقدمات المرحلة الأولى المستوى الثاني";   break;
                    case self::INTRO_STAGE_SECOND_LEVEL_ONE: return "المقدمات المرحلة الثانية المستوى الأول";   break;
                    case self::INTRO_STAGE_SECOND_LEVEL_TWO: return "المقدمات المرحلة الثانية المستوى الثاني"; break;
                    case self::INTRO_STAGE_THIRD_LEVEL_ONE:  return "المقدمات المرحلة الثالثة المستوى الأول";   break;
                    case self::INTRO_STAGE_THIRD_LEVEL_TWO:  return "المقدمات المرحلة الثالثة المستوى الثاني"; break;
                }
                break;
            case Language::ENGLISH:
                switch ($stage) {
                    case self::BEGINNER_STAGE:               return "Beginner Stage";                       break;
                    case self::INTRO_STAGE_FIRST_LEVEL_ONE:  return "Introductions First Stage Level One";  break;
                    case self::INTRO_STAGE_FIRST_LEVEL_TWO:  return "Introductions First Stage Level Two";  break;
                    case self::INTRO_STAGE_SECOND_LEVEL_ONE: return "Introductions Second Stage Level One"; break;
                    case self::INTRO_STAGE_SECOND_LEVEL_TWO: return "Introductions Second Stage Level Two"; break;
                    case self::INTRO_STAGE_THIRD_LEVEL_ONE:  return "Introductions Third Stage Level One";  break;
                    case self::INTRO_STAGE_THIRD_LEVEL_TWO:  return "Introductions Third Stage Level Two";  break;
                }
                break;
        }

        return "unknown";
    }

    public static function getStages() {
        return array(
            self::BEGINNER_STAGE,
            self::INTRO_STAGE_FIRST_LEVEL_ONE,
            self::INTRO_STAGE_FIRST_LEVEL_TWO,
            self::INTRO_STAGE_SECOND_LEVEL_ONE,
            self::INTRO_STAGE_SECOND_LEVEL_TWO,
            self::INTRO_STAGE_THIRD_LEVEL_ONE,
            self::INTRO_STAGE_THIRD_LEVEL_TWO
        );
    }

    public static function getRandomStage()
    {
       $stages = self::getStages();
       return (integer)$stages[array_rand($stages)];
    }
}
