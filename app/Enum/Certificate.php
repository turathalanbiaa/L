<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/20/2019
 * Time: 5:52 PM
 */

namespace App\Enum;


class Certificate
{
    const RELIGION = 1;
    const INTERMEDIATE_SCHOOL = 2;
    const HIGH_SCHOOL = 3;
    const DIPLOMA = 4;
    const BACHELORS = 5;
    const MASTER = 6;
    const PHD = 7;
    const OTHER = 8;

    /**
     * Get all certificates.
     *
     * @return array
     */
    public static function getCertificates()
    {
        return array(
            self::RELIGION,
            self::INTERMEDIATE_SCHOOL,
            self::HIGH_SCHOOL,
            self::DIPLOMA,
            self::BACHELORS,
            self::MASTER,
            self::PHD,
            self::OTHER
        );
    }

    /**
     * Get the name of the certificate.
     *
     * @param $Certificate
     * @return string
     */
    public static function getCertificateName($Certificate)
    {
        $locale = app()->getLocale();
        switch ($locale) {
            case Language::ARABIC:
                switch ($Certificate) {
                    case self::RELIGION:
                        return "حوزوي";
                        break;
                    case self::INTERMEDIATE_SCHOOL:
                        return "متوسطة";
                        break;
                    case self::HIGH_SCHOOL:
                        return "أعدادية";
                        break;
                    case self::DIPLOMA:
                        return "دبلوم";
                        break;
                    case self::BACHELORS:
                        return "بكالوريوس";
                        break;
                    case self::MASTER:
                        return "دراسات عليا";
                        break;
                    case self::PHD:
                        return "دكتوراه";
                        break;
                    case self::OTHER:
                        return "أخرى";
                        break;
                }
                break;
            case Language::ENGLISH:
                switch ($Certificate) {
                    case self::RELIGION:
                        return "Religion";
                        break;
                    case self::INTERMEDIATE_SCHOOL:
                        return "Intermediate School";
                        break;
                    case self::HIGH_SCHOOL:
                        return "High School";
                        break;
                    case self::DIPLOMA:
                        return "Diploma";
                        break;
                    case self::BACHELORS:
                        return "Bachelors";
                        break;
                    case self::MASTER:
                        return "Master";
                        break;
                    case self::PHD:
                        return "PHD";
                        break;
                    case self::OTHER:
                        return "Other";
                        break;
                }
                break;
        }

        return "";
    }

    /**
     * Get the random of certificate.
     *
     * @return int
     */
    public static function getRandomCertificate()
    {
        $certificates = self::getCertificates();
        return (integer)$certificates[array_rand($certificates)];
    }
}
