<?php

namespace App\Enums;

enum Handicap: int implements Selectable
{
    case NONE =        0;
    case MENTAL =      1;
    case PHYSICAL =    2;
    case EDUCATIONAL = 3;

    public function label(): string
    {
        return match($this) {
            Handicap::MENTAL => '精神',
            Handicap::PHYSICAL => '身体',
            Handicap::EDUCATIONAL => '療育',
            Handicap::NONE => '非公表',
        };
    }

    public static function asSelectArray()
    {
        $items = [];
        foreach(Handicap::cases() as $handicap) {
            $items[$handicap->value] = $handicap->label();
        }
        return $items;
    }
}
