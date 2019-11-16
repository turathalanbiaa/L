<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/27/2019
 * Time: 2:25 PM
 */

namespace App\Enum;


class AnnouncementType
{
    const STUDENT = 1;
    const LISTENER = 2;
    const ALL = 3;

    public static function getStateName($stateNumber)
    {
        switch ($stateNumber)
        {
            case self::STUDENT:  return "طالب";  break;
            case self::LISTENER: return "مستمع"; break;
            case self::ALL:      return "كلاهما"; break;
        }

        return "";
    }

    /**
     * @return int
     */
    public static function getRandomType()
    {
        $arrayTypeList = array(self::STUDENT, self::LISTENER, self::ALL);
        return (integer)$arrayTypeList[array_rand($arrayTypeList)];
    }
}
