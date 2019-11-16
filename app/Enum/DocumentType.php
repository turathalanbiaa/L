<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/21/2019
 * Time: 3:27 PM
 */

namespace App\Enum;


class DocumentType
{
    const PERSONAL_IDENTIFICATION = 1;
    const RELIGIOUS_RECOMMENDATION = 2;
    const CERTIFICATE = 3;

    /**
     * @param $typeNumber
     * @return string
     */
    public static function getTypeName($typeNumber)
    {
        switch ($typeNumber)
        {
            case self::PERSONAL_IDENTIFICATION:  return "الهوية الشخصية";  break;
            case self::RELIGIOUS_RECOMMENDATION: return "التزكية الدينية"; break;
            case self::CERTIFICATE:              return "الشهادة العلمية"; break;
        }

        return "Nothing";
    }

    /**
     * @return int
     */
    public static function getRandomType()
    {
        $arrayTypeList = array(self::PERSONAL_IDENTIFICATION, self::RELIGIOUS_RECOMMENDATION, self::CERTIFICATE);
        return (integer)$arrayTypeList[array_rand($arrayTypeList)];
    }
}