<?php

namespace ColorConverter\Tests;

use PHPUnit\Framework\TestCase;
use ColorConverter\ColorConverter;

class ColorConverterTest extends TestCase
{
    public function testHexToRgb()
    {
        $this->assertEquals(['R' => 255, 'G' => 255, 'B' => 255], ColorConverter::hexToRgb('#FFFFFF'));
        $this->assertEquals(['R' => 0, 'G' => 0, 'B' => 0], ColorConverter::hexToRgb('#000000'));
        // Add more test cases for different HEX values
    }

    public function testRgbToHex()
    {
        $this->assertEquals('#ffffff', ColorConverter::rgbToHex(255, 255, 255));
        $this->assertEquals('#000000', ColorConverter::rgbToHex(0, 0, 0));
        // Add more test cases for different RGB values
    }

    public function testRalToRgbMetas()
    {
        $this->assertNotEquals(['R' => 255, 'G' => 255, 'B' => 255], ColorConverter::ralToRgbMetas('RAL1000'));
        // Add more test cases for different RAL values
    }

    public function testRalToRgbValue()
    {
        $this->assertNotEquals('255, 255, 255', ColorConverter::ralToRgbValue('RAL1000'));
        // Add more test cases for different RAL values
    }

    public function testRgbToRalMetas()
    {
        $this->assertEquals([
            'number' => 'RAL1000',
            'rangeindex' => '1',
            'nameEnglish' => 'Green beige',
            'nameGerman' => 'Grünbeige',
            'hex' => 'CDBA88',
        ], ColorConverter::rgbToRalMetas(205, 186, 136));
        // Add more test cases for different RGB values
    }

    public function testRgbToRalValue()
    {
        $this->assertEquals('RAL1000', ColorConverter::rgbToRalValue(205, 186, 136));
        // Add more test cases for different RGB values
    }
}
