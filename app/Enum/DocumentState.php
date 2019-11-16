<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/21/2019
 * Time: 3:57 PM
 */

namespace App\Enum;


class DocumentState
{
    const ACCEPT = 1;
    const REJECT = 2;
    const REVIEW = 3;

    /**
     * @param $stateNumber
     * @return string
     */
    public static function getStateName($stateNumber)
    {
        switch ($stateNumber)
        {
            case self::ACCEPT: return "مقبولة";     break;
            case self::REJECT: return "مرفوضة";     break;
            case self::REVIEW: return "قيد المراجعة"; break;
        }

        return "Nothing";
    }

    /**
     * @return int
     */
    public static function getRandomSate()
    {
        $arrayStateList = array(self::ACCEPT, self::REJECT, self::REVIEW);
        return (integer)$arrayStateList[array_rand($arrayStateList)];
    }
}