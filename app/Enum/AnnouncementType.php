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
    const STUDENT = 1;
    const LISTENER = 2;
    const ALL = 3;

    /**
     * Get all types.
     *
     * @return array
     */
    public static function getTypes() {
        return array(
            self::STUDENT,
            self::LISTENER,
            self::ALL
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
                   case self::STUDENT:  return "طالب";  break;
                   case self::LISTENER: return "مستمع"; break;
                   case self::ALL:      return "كلاهما"; break;
               }
               break;
           case Language::ENGLISH:
               switch ($type) {
                   case self::STUDENT:  return "Student";  break;
                   case self::LISTENER: return "Listener"; break;
                   case self::ALL:      return "All";      break;
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
