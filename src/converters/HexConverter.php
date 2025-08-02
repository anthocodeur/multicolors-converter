<?php

namespace ColorConverter\Converters;

use ColorConverter\ColorConverter;

class HexConverter extends ColorConverter
{
    /**
     * Convert hex color to RAL
     *  
     * @param string $color
     * @return ?string
     */
    public static function hexToRal(string $color, bool $exact = false): string|null
    {
        foreach (parent::getColors() as $c) {
            if ($c['hex'] === $color) {
                return $c['ral'];
            }
        }
        if ($exact) {
            return null;
        }
        if (!preg_match('/^#([A-Fa-f0-9]{6})$/', $color)) {
            throw new \Exception('Invalid hex color');
        }

        $color = str_replace('#', '', $color);

        $closestColor = null;
        $smallestDifference = PHP_INT_MAX;

        foreach (parent::getColors() as $c) {

            $difference = abs(hexdec(substr($color, 0, 2)) - hexdec(substr($c['hex'], 1, 2))) +
                abs(hexdec(substr($color, 2, 2)) - hexdec(substr($c['hex'], 3, 2))) +
                abs(hexdec(substr($color, 4, 2)) - hexdec(substr($c['hex'], 5, 2)));

            if ($difference < $smallestDifference) {
                $smallestDifference = $difference;
                $closestColor = $c['ral'];
            }
        }
        if ($closestColor) {
            return $closestColor;
        }
        return null;
    }


    /**
     * Convert hex color to RGB
     * 
     * @param string $color
     * @return ?array
     */
    public static function hexToRgb(string $hexa, bool $exact = false): array|null
    {
        foreach (parent::getColors() as $c) {
            if ($c['hex'] === $hexa) {
                $rgb = explode("-", $c['rgb']);
                return [
                    "R" => (int) $rgb[0],
                    "G" => (int) $rgb[1],
                    "B" => (int) $rgb[2],
                ];
            }
        }
        if ($exact) {
            return null;
        }
        if (!preg_match('/^#([A-Fa-f0-9]{6})$/', $hexa)) {
            throw new \Exception('Invalid hex color');
        }

        $color = str_replace('#', '', $hexa);

        $closestColor = null;
        $smallestDifference = PHP_INT_MAX;

        foreach (parent::getColors() as $c) {
            $difference = abs(hexdec(substr($color, 0, 2)) - hexdec(substr($c['hex'], 1, 2))) +
                abs(hexdec(substr($color, 2, 2)) - hexdec(substr($c['hex'], 3, 2))) +
                abs(hexdec(substr($color, 4, 2)) - hexdec(substr($c['hex'], 5, 2)));

            if ($difference < $smallestDifference) {
                $smallestDifference = $difference;
                $closestColor = $c;
            }
        }
        if ($closestColor) {
            $rgb = explode("-", $closestColor['rgb']);
            return [
                "R" => (int) $rgb[0],
                "G" => (int) $rgb[1],
                "B" => (int) $rgb[2],
            ];
        }
        return null;
    }

    /**
     * Convert hex color to name
     * 
     * @param string $color
     * @return ?string
     */
    public static function hexToName(string $hexa, bool $exact = false): string|null
    {
        foreach (parent::getColors() as $c) {
            if ($c['hex'] === $hexa) {
                return $c['name'];
            }
        }
        if ($exact) {
            return null;
        }
        if (!preg_match('/^#([A-Fa-f0-9]{6})$/', $hexa)) {
            throw new \Exception('Invalid hex color');
        }

        $color = str_replace('#', '', $hexa);

        $closestColor = null;
        $smallestDifference = PHP_INT_MAX;

        foreach (parent::getColors() as $c) {
            $difference = abs(hexdec(substr($color, 0, 2)) - hexdec(substr($c['hex'], 1, 2))) +
                abs(hexdec(substr($color, 2, 2)) - hexdec(substr($c['hex'], 3, 2))) +
                abs(hexdec(substr($color, 4, 2)) - hexdec(substr($c['hex'], 5, 2)));

            if ($difference < $smallestDifference) {
                $smallestDifference = $difference;
                $closestColor = $c['name'];
            }
        }
        if ($closestColor) {
            return $closestColor;
        }
        return null;
    }
}
