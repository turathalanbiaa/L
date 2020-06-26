<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/27/2019
 * Time: 2:47 PM
 */

namespace App\Enum;


class EnrollmentState
{
    const UNSUBSCRIBE = 0;
    const SUBSCRIBE = 1;

    /**
     * Get all states.
     *
     * @return array
     */
    public static function getStates()
    {
        return array(
            self::SUBSCRIBE,
            self::UNSUBSCRIBE
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
                    case self::SUBSCRIBE:
                        return "اشتراك";
                        break;
                    case self::UNSUBSCRIBE:
                        return "الغاء الاشتراك";
                        break;
                }
                break;
            case Language::ENGLISH:
                switch ($state) {
                    case self::SUBSCRIBE:
                        return "Subscribe";
                        break;
                    case self::UNSUBSCRIBE:
                        return "Unsubscribe";
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
