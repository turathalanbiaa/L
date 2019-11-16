<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/28/2019
 * Time: 11:15 PM
 */

namespace App\Enum;


class ConvertUserState
{
    const NOT_SEEN = 0;
    const SEEN = 1;

    /**
     * @param $stateNumber
     * @return string
     */
    public static function getStateName($stateNumber)
    {
        switch ($stateNumber)
        {
            case self::NOT_SEEN:  return "غير مشاهد"; break;
            case self::SEEN:     return "مشاهد";     break;
        }

        return "";
    }
}
