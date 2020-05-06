<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/21/2019
 * Time: 3:57 PM
 */

namespace App\Enum;


class DocumentState
{
    const ACCEPT = 1;
    const REJECT = 2;
    const REVIEW = 3;

    /**
     * Get all states.
     *
     * @return array
     */
    public static function getStates()
    {
        return array(
            self::ACCEPT,
            self::REJECT,
            self::REVIEW
        );
    }
    /**
     * Get the name of the state.
     *
     * @param $stateNumber
     * @return string
     */
    public static function getStateName($stateNumber)
    {
        $locale = app()->getLocale();
        switch ($locale) {
            case Language::ARABIC:
                switch ($stateNumber) {
                    case self::ACCEPT:
                        return "مقبولة";
                        break;
                    case self::REJECT:
                        return "مرفوضة";
                        break;
                    case self::REVIEW:
                        return "قيد المراجعة";
                        break;
                }
                break;
            case Language::ENGLISH:
                switch ($stateNumber) {
                    case self::ACCEPT:
                        return "Accepted";
                        break;
                    case self::REJECT:
                        return "Rejected";
                        break;
                    case self::REVIEW:
                        return "Under Review";
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
