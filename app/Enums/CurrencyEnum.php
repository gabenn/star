<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

class CurrencyEnum extends Enum
{
    CONST PLN = 'PLN';
    CONST DOLLAR = 'USD';
    CONST EURO = 'EUR';
    CONST POUND = 'GBP';

    public static function getCurrencySymbol(string|null $currency): string
    {
        return match ($currency) {
            self::PLN => 'zł',
            self::DOLLAR => '$',
            self::EURO => '€',
            self::POUND => '£',
            default => '',
        };
    }

    public static function toArray(): array
    {
        return [
            self::PLN => 'PLN',
            self::DOLLAR => 'USD',
            self::EURO => 'EUR',
            self::POUND => 'GBP',
        ];
    }

}
