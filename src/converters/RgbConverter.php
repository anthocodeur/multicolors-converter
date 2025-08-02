<?php

namespace ColorConverter\Converters;

use ColorConverter\ColorConverter;



class RgbConverter extends ColorConverter
{

    /**
     * Convert RGB color to hex
     * 
     * @param array $color R, G, B values must be in the array, values between 0 and 255
     * @return array|null
     * 
     */
    public static function rgbToHex(int $r, int $g, int $b, bool $exact = false): string|null
    {
        $color = $r . '-' . $g . '-' . $b;
        foreach (parent::getColors() as $c) {
            if ($c['rgb'] === $color) {
                return $c['hex'];
            }
        }
        if ($exact) {
            return null;
        }
        if ($r < 0 || $r > 255 || $g < 0 || $g > 255 || $b < 0 || $b > 255) {
            throw new \Exception('Invalid RGB color');
        }
        return '#' . dechex($r) . dechex($g) . dechex($b);
    }

    /**
     * Convert RGB color to RAL
     *
     * @param array $color R, G, B values must be in the array, values between 0 and 255
     * @return array|null
     */
    public static function rgbToRal(int $r, int $g, int $b, bool $exact = false): string|null
    {
        $color = $r . '-' . $g . '-' . $b;
        foreach (parent::getColors() as $c) {
            if ($c['rgb'] === $color) {
                return $c['ral'];
            }
        }
        if ($exact) {
            return null;
        }
        if ($r < 0 || $r > 255 || $g < 0 || $g > 255 || $b < 0 || $b > 255) {
            throw new \Exception('Invalid RGB color');
        }

        $closestRal = null;
        $smallestDifference = PHP_INT_MAX;

        foreach (parent::getColors() as $c) {
            list($r1, $g1, $b1) = explode("-", $c['rgb']);
            $difference = abs($r - $r1) + abs($g - $g1) + abs($b - $b1);

            if ($difference < $smallestDifference) {
                $smallestDifference = $difference;
                $closestRal = $c['ral'];
            }
        }
        return $closestRal;
    }

    /**
     * Convert RGB color to name
     * 
     * @param array $color R, G, B values must be in the array, values between 0 and 255
     * @return array|null
     */
    public static function rgbToName(int $r, int $g, int $b, bool $exact = false): string|null
    {
        $color = $r . '-' . $g . '-' . $b;
        foreach (parent::getColors() as $c) {
            if ($c['rgb'] === $color) {
                return $c['name'];
            }
        }
        if ($exact) {
            return null;
        }
        if ($r < 0 || $r > 255 || $g < 0 || $g > 255 || $b < 0 || $b > 255) {
            throw new \Exception('Invalid RGB color');
        }

        $closestColor = null;
        $smallestDifference = PHP_INT_MAX;

        foreach (parent::getColors() as $c) {
            list($r1, $g1, $b1) = explode("-", $c['rgb']);
            $difference = abs($r - $r1) + abs($g - $g1) + abs($b - $b1);

            if ($difference < $smallestDifference) {
                $smallestDifference = $difference;
                $closestColor = $c['name'];
            }
        }

        return $closestColor;
    }
}
