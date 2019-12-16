<?php


namespace App\Enum;


class Language
{
    const LANGUAGES = [
        "ar"=> "العربية",
        "en"=> "English"
    ];

    /**
     * @param $locale
     * @return mixed
     */
    public static function getLanguageName($locale)
    {
        return self::LANGUAGES[$locale];
    }

    /**
     * @return array
     */
    public static function getList()
    {
        return self::LANGUAGES;
    }

    /**
     * @return string
     */
    public static function getRandomLanguage()
    {
        return (string)array_rand(self::LANGUAGES);
    }
}
