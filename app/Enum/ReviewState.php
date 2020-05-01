<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/27/2019
 * Time: 2:47 PM
 */

namespace App\Enum;


class ReviewState
{
    const VISIBLE = 1;
    const INVISIBLE = 2;

    /**
     * Get all states.
     *
     * @return array
     */
    public static function getStates() {
        return array(
            self::VISIBLE,
            self::INVISIBLE
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
                    case self::VISIBLE:
                        return "مرئي";
                        break;
                    case self::INVISIBLE:
                        return "غير مرئي";
                        break;
                }
                break;
            case Language::ENGLISH:
                switch ($state) {
                    case self::VISIBLE:
                        return "Visible";
                        break;
                    case self::INVISIBLE:
                        return "Invisible";
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
