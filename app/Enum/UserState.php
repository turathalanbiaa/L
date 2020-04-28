<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/20/2019
 * Time: 5:59 PM
 */

namespace App\Enum;


class UserState
{
    const UNTRUSTED = 1;
    const TRUSTED = 2;
    const DISABLE = 3;

    /**
     * Get the name of the state.
     *
     * @param $state
     * @return string
     */
    public static function getStateName($state)
    {
        $locale = app()->getLocale();
        switch ($locale) {
            case Language::ARABIC:
                switch ($state) {
                    case self::UNTRUSTED:
                        return "غير موثوق";
                        break;
                    case self::TRUSTED:
                        return "موثوق";
                        break;
                    case self::DISABLE:
                        return "معطل";
                        break;
                }
                break;
            case Language::ENGLISH:
                switch ($state) {
                    case self::UNTRUSTED:
                        return "Untrusted";
                        break;
                    case self::TRUSTED:
                        return "Trusted";
                        break;
                    case self::DISABLE:
                        return "Disable";
                        break;
                }
                break;
        }

        return "";
    }
}
