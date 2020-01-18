<?php


namespace App\Enum;


class Language
{
    const ARABIC = "ar";
    const ENGLISH = "en";

    public static function getLanguages()
    {
        return array(self::ARABIC, self::ENGLISH);
    }

    public static function getLanguageName($locale)
    {
        switch ($locale){
            case self::ARABIC:  return "العربية"; break;
            case self::ENGLISH: return "English"; break;
        }

        return "unknown";
    }

    public static function getRandomLanguage()
    {
        return (string)array_rand(self::getLanguages());
    }
}
