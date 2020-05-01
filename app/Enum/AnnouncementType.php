<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/27/2019
 * Time: 2:25 PM
 */

namespace App\Enum;


class AnnouncementType
{
    const STUDENTS = 1;
    const LISTENERS = 2;
    const BOTH = 3;

    /**
     * Get all types.
     *
     * @return array
     */
    public static function getTypes() {
        return array(
            self::STUDENTS,
            self::LISTENERS,
            self::BOTH
        );
    }

    /**
     * Get the name of the type.
     *
     * @param $type
     * @return string
     */
    public static function getTypeName($type) {
       $locale = app()->getLocale();
       switch ($locale) {
           case Language::ARABIC:
               switch ($type) {
                   case self::STUDENTS:
                       return "للطلاب";
                       break;
                   case self::LISTENERS:
                       return "للمستمعين";
                       break;
                   case self::BOTH:
                       return "لكلاهما";
                       break;
               }
               break;
           case Language::ENGLISH:
               switch ($type) {
                   case self::STUDENTS:
                       return "For Students";
                       break;
                   case self::LISTENERS:
                       return "For Listeners";
                       break;
                   case self::BOTH:
                       return "For Both";
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
    public static function getRandomType() {
        $types = self::getTypes();
        return (integer)$types[array_rand($types)];
    }
}
