# Unofficial Moota integration in Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/atfromhome/laravel-moota.svg?style=flat-square)](https://packagist.org/packages/fromhome/laravel-moota)
[![PHPUnit](https://github.com/atfromhome/laravel-moota/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/atfromhome/laravel-moota/actions/workflows/run-tests.yml)
[![Laravel Pint](https://github.com/atfromhome/laravel-moota/actions/workflows/fix-php-code-style-issues.yml/badge.svg?branch=main)](https://github.com/atfromhome/laravel-moota/actions/workflows/fix-php-code-style-issues.yml)
[![Psalm](https://github.com/atfromhome/laravel-moota/actions/workflows/run-psalm-static-analyst.yml/badge.svg?branch=main)](https://github.com/atfromhome/laravel-moota/actions/workflows/run-psalm-static-analyst.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/atfromhome/laravel-moota.svg?style=flat-square)](https://packagist.org/packages/fromhome/laravel-moota)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require atfromhome/laravel-moota
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-moota-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-moota-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-moota-views"
```

## Usage

```php
$moota = new FromHome\Moota();
echo $moota->echoPhrase('Hello, FromHome!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Nuradiyana](https://github.com/atfromhome)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
