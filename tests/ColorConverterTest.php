<?php

namespace ColorConverter\Tests;

use PHPUnit\Framework\TestCase;
use ColorConverter\ColorConverter;
use ColorConverter\Converters\HexConverter;
use ColorConverter\Converters\RalConverter;
use ColorConverter\Converters\RgbConverter;

class ColorConverterTest extends TestCase
{
    public function testHexToRgb()
    {
        $this->assertEquals(['R' => 255, 'G' => 255, 'B' => 255], HexConverter::hexToRgb('#FFFFFF'));
        $this->assertEquals(['R' => 0, 'G' => 0, 'B' => 0], HexConverter::hexToRgb('#000000'));
    }

    public function testRgbToHex()
    {
        $this->assertEquals('#FFFFFF', RgbConverter::rgbToHex(255, 255, 255));
        $this->assertEquals('#000000', RgbConverter::rgbToHex(0, 0, 0));
    }

    public function testRgbToRal()
    {
        $this->assertEquals('RAL1000', RgbConverter::rgbToRal(205, 186, 136));
    }
}
