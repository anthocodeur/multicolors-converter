# Color Converter by anthowd

ColorConverter is a modern PHP package that provides robust and precise conversions between various color formats, including Hexadecimal, RGB, and RAL color systems. Leveraging encapsulated converters (`HexConverter`, `RalConverter`, `RgbConverter`), it enables easy and precise manipulation of colors.

## Installation

Install this package easily via Composer:

```
composer require anthocodeur/multicolors-converter
```

## Usage

You can use the static methods provided by the dedicated converter classes to convert colors between different formats.

### Convert Hexadecimal to RGB

```
use ColorConverter\HexConverter;

$hex = '#FF0000';
$rgb = HexConverter::hexToRgb($hex);
print_r($rgb); // ['R' => 255, 'G' => 0, 'B' => 0]
```

### Convert RGB to Hexadecimal

```
use ColorConverter\RgbConverter;

$r = 255;
$g = 0;
$b = 0;
$hex = RgbConverter::rgbToHex($r, $g, $b);
echo $hex; // #ff0000
```

### Convert RGB to RAL

```
use ColorConverter\RalConverter;

$r = 255;
$g = 0;
$b = 0;
$ral = RalConverter::rgbToRalValue($r, $g, $b);
echo $ral; // e.g., RAL1000
```

### Convert RAL to RGB

```
use ColorConverter\RalConverter;

$ral = 'RAL1000';
$rgb = RalConverter::ralToRgb($ral);
print_r($rgb); // ['R' => 203, 'G' => 186, 'B' => 136]
```

## Contributing

Contributions are welcome! Please see [CONTRIBUTING.md](CONTRIBUTING.md) for guidelines on how to contribute to this project.

## License

This package is open-source software licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

```

```
