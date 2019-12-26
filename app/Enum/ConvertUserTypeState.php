<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/28/2019
 * Time: 11:15 PM
 */

namespace App\Enum;


class ConvertUserTypeState
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
            case self::NOT_ACTIVE:  return "غير مشاهد"; break;
            case self::ACTIVE:     return "مشاهد";     break;
        }

        return "";
    }
}
