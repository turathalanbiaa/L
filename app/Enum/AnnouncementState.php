<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/27/2019
 * Time: 2:47 PM
 */

namespace App\Enum;


class AnnouncementState
{
    const NOT_ACTIVE = 0;
    const ACTIVE = 1;


    /**
     * @param $stateNumber
     * @return string
     */
    public static function getStateName($stateNumber)
    {
        switch ($stateNumber) {
            case self::NOT_ACTIVE:  return "غير فعال"; break;
            case self::ACTIVE:     return "فعال";     break;
        }

        return "";
    }

    /**
     * @return int
     */
    public static function getRandomState()
    {
        $arrayStateList = array(self::NOT_ACTIVE, self::ACTIVE);
        return (integer)$arrayStateList[array_rand($arrayStateList)];
    }
}
