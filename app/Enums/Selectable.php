<?php

namespace App\Enums;

/**
 * Enumをセレクトボックスやチェックボックスで使いやすくするためのインタフェース
 */
interface Selectable
{
    /**
     * セレクトボックスのラベル用文字列を返す
     */
    public function label(): string;

    /**
     * Enumのvalueとラベル用文字列をkey-valueの配列にして返す
     */
    public static function asSelectArray();
}
