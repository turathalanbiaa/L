<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/20/2019
 * Time: 5:38 PM
 */

namespace App\Enum;


class UserType
{
    const STUDENT = 1;
    const LISTENER = 2;

    /**
     * @param $typeNumber
     * @return string
     */
    public static function getTypeName($typeNumber)
    {
        switch ($typeNumber)
        {
            case self::STUDENT:  return "طالب";  break;
            case self::LISTENER: return "مستمع"; break;
        }

        return "Nothing";
    }

    /**
     * @return int
     */
    public static function getRandomType()
    {
       $arrayTypeList = array(self::STUDENT, self::LISTENER);
       return (integer)$arrayTypeList[array_rand($arrayTypeList)];
    }
}