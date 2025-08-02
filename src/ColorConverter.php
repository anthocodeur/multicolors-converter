<?php

namespace ColorConverter;

abstract class ColorConverter
{
    protected static ?array $colors = null;

    protected static function getColors(): array
    {
        if (self::$colors === null) {
            self::$colors = json_decode(file_get_contents(__DIR__ . '/datas/colors.json'), true);
        }
        return self::$colors;
    }
}
