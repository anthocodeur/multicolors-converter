# Color Converter by anthowd

ColorConverter is a package that allows you to convert hexadecimal values to RGB, RGB to RAL, and other combinations.

## Installation

You can install this package via Composer. Run the following command:

```bash
composer require anthocodeur/multicolors-converter
```

## Usage

To use this package, you can utilize the provided static methods to convert between different color formats. Here are some examples:

### Convert Hexadecimal to RGB

```php
use ColorConverter\ColorConverter;

$hex = '#FF0000';
$rgb = ColorConverter::hexToRgb($hex);
print_r($rgb); // Output: ['R' => 255, 'G' => 0, 'B' => 0]
```

### Convert RGB to Hexadecimal

```php
use ColorConverter\ColorConverter;

$r = 255;
$g = 0;
$b = 0;
$hex = ColorConverter::rgbToHex($r, $g, $b);
echo $hex; // Output: #ff0000
```

### Convert RGB to RAL

```php
use ColorConverter\ColorConverter;

$r = 255;
$g = 0;
$b = 0;
$ral = ColorConverter::rgbToRalValue($r, $g, $b);
echo $ral; // Output: RALXXXX (RAL color code)
```

### Convert RAL to RGB

```php
use ColorConverter\ColorConverter;

$ral = 'RAL1000';
$rgb = ColorConverter::ralToRgbMetas($ral);
print_r($rgb); // Output: ['R' => 203, 'G' => 186, 'B' => 136]
```

## Contributing

Contributions are welcome! Please read the [contributing guidelines](CONTRIBUTING.md) for details on how to contribute to this project.

## License

This package is open-source software licensed under the MIT License
