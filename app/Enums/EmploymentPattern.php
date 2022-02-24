<?php

namespace App\Enums;

enum EmploymentPattern:int
{
    case UNKNOWN =    0;
    case REGULAR =    1;
    case CONTRACTOR = 2;
    case TEMPORARY =  3;
    case PARTTIME =   4;
    case OTHER =      5;

    public function label(): string
    {
        return match($this) {
            EmploymentPattern::REGULAR => '正社員',
            EmploymentPattern::CONTRACTOR => '契約社員',
            EmploymentPattern::TEMPORARY => '派遣社員',
            EmploymentPattern::PARTTIME => 'アルバイト・パート',
            EmploymentPattern::OTHER => 'その他',
            EmploymentPattern::UNKNOWN => '不明',
        };
    }

    public static function asSelectArray()
    {
        $items = [];
        foreach(EmploymentPattern::cases() as $pattern) {
            $items[$pattern->value] = $pattern->label();
        }
        return $items;
    }
}
