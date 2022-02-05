<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Gender extends Enum
{
    const NONE =   0;
    const MALE =   1;
    const FEMALE = 2;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::MALE:
                return '男性';
            case self::FEMALE:
                return '女性';
            default:
                return '非公表';
        }
    }

    public static function getValue(string $key)
    {
        switch ($key) {
            case '男性':
                return self::MALE;
            case '女性':
                return self::FEMALE;
            default:
                return self::NONE;
        }
    }
}
