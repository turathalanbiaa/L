<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/20/2019
 * Time: 5:38 PM
 */

namespace App\Enum;


class UserType
{
    const STUDENT = 1;
    const LISTENER = 2;

    public static function getTypes() {
        return array(self::STUDENT, self::LISTENER);
    }

    public static function getTypeName($type)
    {
        $locale = app()->getLocale();
        switch ($locale) {
            case Language::ARABIC:
                switch ($type) {
                    case self::STUDENT:  return "طالب";  break;
                    case self::LISTENER: return "مستمع"; break;
                }
                break;

            case Language::ENGLISH :
                switch ($type) {
                    case self::STUDENT:  return "Student";  break;
                    case self::LISTENER: return "Listener"; break;
                }
                break;
        }

        return "unknown";
    }

    public static function getRandomType()
    {
        $types = self::getTypes();
        return (integer)$types[array_rand($types)];
    }
}
