<?php

namespace App\Enums;

enum Gender: int implements Selectable
{
    case NONE =   0;
    case MALE =   1;
    case FEMALE = 2;

    public function label(): string
    {
        return match($this) {
            Gender::MALE => '男性',
            Gender::FEMALE => '女性',
            Gender::NONE => '非公表',
        };
    }

    public static function asSelectArray()
    {
        $items = [];
        foreach(Gender::cases() as $gender) {
            $items[$gender->value] = $gender->label();
        }
        return $items;
    }
}
