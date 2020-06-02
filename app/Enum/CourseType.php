<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/20/2019
 * Time: 5:38 PM
 */

namespace App\Enum;


class CourseType
{
    const GENERAL = 1;
    const STUDY = 2;

    /**
     * Get all types.
     *
     * @return array
     */
    public static function getTypes()
    {
        return array(
            self::GENERAL,
            self::STUDY
        );
    }

    /**
     * Get the name of the type.
     *
     * @param $type
     * @return string
     */
    public static function getTypeName($type)
    {
        $locale = app()->getLocale();
        switch ($locale) {
            case Language::ARABIC:
                switch ($type) {
                    case self::GENERAL:
                        return "عامة";
                        break;
                    case self::STUDY:
                        return "دراسية";
                        break;
                }
                break;
            case Language::ENGLISH :
                switch ($type) {
                    case self::GENERAL:
                        return "General";
                        break;
                    case self::STUDY:
                        return "Study";
                        break;
                }
                break;
        }

        return "";
    }

    /**
     * Get the random type.
     *
     * @return int
     */
    public static function getRandomType()
    {
        $types = self::getTypes();
        return (integer)$types[array_rand($types)];
    }
}
