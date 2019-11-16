<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/20/2019
 * Time: 5:59 PM
 */

namespace App\Enum;


class VerifyState
{
    const NOT_ACTIVE = 0;
    const ACTIVE = 1;

    /**
     * @param $stateNumber
     * @return string
     */
    public static function getStateName($stateNumber)
    {
        switch ($stateNumber)
        {
            case self::NOT_ACTIVE:  return "غير فعال"; break;
            case self::ACTIVE:     return "فعال";     break;
        }

        return "Nothing";
    }
}