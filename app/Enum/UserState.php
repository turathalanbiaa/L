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
     * Get all states.
     *
     * @return array
     */
    public static function getStates()
    {
        return array(
            self::UNTRUSTED,
            self::TRUSTED,
            self::DISABLE
        );
    }

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
                        return "غير موثق";
                        break;
                    case self::TRUSTED:
                        return "موثق";
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

    /**
     * Get the random state.
     *
     * @return int
     */
    public static function getRandomState()
    {
        $states = self::getStates();
        return (integer)$states[array_rand($states)];
    }
}
