<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/28/2019
 * Time: 10:40 PM
 */

namespace App\Enum;


class IssueType
{
    const x=1;
    const y=1;

    public static function getRandomType()
    {
        $arrayTypeList = array(self::x, self::y);
        return (integer)$arrayTypeList[array_rand($arrayTypeList)];
    }
}