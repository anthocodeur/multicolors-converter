<?php

namespace ColorConverter;

class ColorConverter
{
    public static function hexToRgb($hex)
    {
        $hex = str_replace('#', '', $hex);
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        return ['R' => $r, 'G' => $g, 'B' => $b];
    }

    public static function rgbToHex($r, $g, $b)
    {
        $hex = sprintf("#%02x%02x%02x", $r, $g, $b);
        return $hex;
    }

    private function loadRalToRgbMap()
    {
        return include __DIR__ . '/sources/ral_to_hex.php';
    }

    private function ralToRgb($ral)
    {
        $ralToRgbMap = $this->loadRalToRgbMap();
        foreach ($ralToRgbMap as $color) {
            if ($color['number'] === $ral) {
                $rgb = self::hexToRgb($color['hex']);
                return $rgb;
            }
        }
        return null;
    }

    public static function ralToRgbMetas($ral)
    {
        $self = new self();
        return $self->ralToRgb($ral);
    }

    public static function ralToRgbValue($ral)
    {
        $self = new self();
        return implode(", ", $self->ralToRgb($ral));
    }

    private function rgbToRal($r, $g, $b)
    {
        $ralToRgbMap = $this->loadRalToRgbMap();
        $min_diff = INF;
        $closest_color = null;

        foreach ($ralToRgbMap as $color) {
            $ral_rgb = self::hexToRgb($color['hex']);
            $diff = sqrt(pow($r - $ral_rgb['R'], 2) + pow($g - $ral_rgb['G'], 2) + pow($b - $ral_rgb['B'], 2));
            if ($diff < $min_diff) {
                $min_diff = $diff;
                $closest_color = $color;
            }
        }
        return $closest_color;
    }

    public static function rgbToRalMetas($r, $g, $b)
    {
        $self = new self();
        return $self->rgbToRal($r, $g, $b);
    }

    public static function rgbToRalValue($r, $g, $b)
    {
        $self = new self();
        return $self->rgbToRal($r, $g, $b)["number"];
    }
}
