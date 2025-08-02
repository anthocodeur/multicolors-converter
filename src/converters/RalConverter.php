<?php

namespace ColorConverter\Converters;

use ColorConverter\ColorConverter;

class RalConverter extends ColorConverter
{

    /**
     * Convert RAL color to hex
     * 
     * @param string $color
     * @return ?string
     * 
     */
    public static function ralToHex(string $color): string|null
    {
        foreach (parent::getColors() as $c) {
            if ($c['ral'] === $color) {
                return $c['hex'];
            }
        }
        return null;
    }

    /**
     * Convert RAL color to RGB
     * 
     * @param string $color
     * @return ?array
     */
    public static function ralToRgb(string $color): array|null
    {
        foreach (parent::getColors() as $c) {
            if ($c['ral'] === $color) {
                $rgb = explode("-", $c['rgb']);
                return [
                    "R" => (int) $rgb[0],
                    "G" => (int) $rgb[1],
                    "B" => (int) $rgb[2],
                ];
            }
        }
        return null;
    }

    /**
     * Convert RAL color to name
     * 
     * @param string $color
     * @return ?string
     */

    public static function ralToName(string $color): string|null
    {
        foreach (parent::getColors() as $c) {
            if ($c['ral'] === $color) {
                return $c['name'];
            }
        }
        return null;
    }
}
