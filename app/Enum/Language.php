<?php


namespace App\Enum;


class Language
{
    const ARABIC = "ar";
    const ENGLISH = "en";

    /**
     * @return int
     */
    public static function getRandomLanguage()
    {
        $arrayLangList = array(self::ARABIC, self::ENGLISH);
        return $arrayLangList[array_rand($arrayLangList)];
    }
}
