<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/27/2019
 * Time: 2:47 PM
 */

namespace App\Enum;


class CourseState
{
    const INACTIVE = 0;
    const ACTIVE = 1;

    /**
     * Get all states.
     *
     * @return array
     */
    public static function getStates() {
        return array(
            self::INACTIVE,
            self::ACTIVE
        );
    }

    /**
     * Get the name of the state.
     *
     * @param $state
     * @return string
     */
    public static function getStateName($state) {
        $locale = app()->getLocale();
        switch ($locale) {
            case Language::ARABIC:
                switch ($state) {
                    case self::INACTIVE:
                        return "غير فعال";
                        break;
                    case self::ACTIVE:
                        return "فعال";
                        break;
                }
                break;
            case Language::ENGLISH:
                switch ($state) {
                    case self::INACTIVE:
                        return "Inactive";
                        break;
                    case self::ACTIVE:
                        return "Active";
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
    public static function getRandomState() {
        $states = self::getStates();
        return (integer)$states[array_rand($states)];
    }
}
