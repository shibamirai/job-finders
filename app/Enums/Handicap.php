<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Handicap extends Enum
{
    const NONE =        0;
    const MENTAL =      1;
    const PHYSICAL =    2;
    const EDUCATIONAL = 3;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::MENTAL:
                return '精神';
            case self::PHYSICAL:
                return '身体';
            case self::EDUCATIONAL:
                return '療育';
            default:
                return '非公表';
        }
    }

    public static function getValue(string $key)
    {
        switch ($key) {
            case '精神':
                return self::MENTAL;
            case '身体':
                return self::PHYSICAL;
            case '療育':
                return self::EDUCATIONAL;
            default:
                return self::NONE;
        }
    }
}
