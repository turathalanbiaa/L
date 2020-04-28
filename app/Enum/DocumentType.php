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
    const PERSONAL_IMAGE = 4;

    /**
     * Get all types.
     *
     * @return array
     */
    public static function getTypes() {
        return array(
            self::PERSONAL_IDENTIFICATION,
            self::RELIGIOUS_RECOMMENDATION,
            self::CERTIFICATE,
            self::PERSONAL_IMAGE
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
                switch ($type)
                {
                    case self::PERSONAL_IDENTIFICATION:
                        return "الهوية الشخصية";
                        break;
                    case self::RELIGIOUS_RECOMMENDATION:
                        return "التزكية الدينية";
                        break;
                    case self::CERTIFICATE:
                        return "الشهادة العلمية";
                        break;
                    case self::PERSONAL_IMAGE:
                        return "الصورة الشخصية";
                        break;
                }
                break;
            case Language::ENGLISH:
                switch ($type)
                {
                    case self::PERSONAL_IDENTIFICATION:
                        return "Personal Identification";
                        break;
                    case self::RELIGIOUS_RECOMMENDATION:
                        return "Religious Recommendation";
                        break;
                    case self::CERTIFICATE:
                        return "Certificate";
                        break;
                    case self::PERSONAL_IMAGE:
                        return "Personal Image";
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
