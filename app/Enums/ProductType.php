<?php

namespace App\Enums;

class ProductType
{
    const RETRO = 'retro';

    const INSPIRE = 'inspire';

    const TYPES = [
        self::RETRO,
        self::INSPIRE
    ];
    public static function toSelect(): array
    {
        $temp = [];

        foreach(self::TYPES as $value) {
            $tmp = [];
            $tmp['id'] = $value;
            $tmp['name'] = $value;
            $temp[] = (object) $tmp;
        }

        return $temp;
    }

}
