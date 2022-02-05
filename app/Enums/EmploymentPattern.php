<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class EmploymentPattern extends Enum
{
    const UNKNOWN =    0;
    const REGULAR =    1;
    const CONTRACTOR = 2;
    const TEMPORARY =  3;
    const PARTTIME =   4;
    const OTHER =      5;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::REGULAR:
                return '正社員';
            case self::CONTRACTOR:
                return '契約社員';
            case self::TEMPORARY:
                return '派遣社員';
            case self::PARTTIME:
                return 'アルバイト・パート';
            case self::OTHER:
                return 'その他';
            default:
                return '不明';
        }
    }

    public static function getValue(string $key)
    {
        switch ($key) {
            case '正社員':
                return self::REGULAR;
            case '契約社員':
                return self::CONTRACTOR;
            case '派遣社員':
                return self::TEMPORARY;
            case 'アルバイト・パート':
                return self::PARTTIME;
            case 'その他':
                return self::OTHER;
            default:
                return self::UNKNOWN;
        }
    }
}
