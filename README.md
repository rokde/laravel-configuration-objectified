# Objectified version of laravel configuration files

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rokde/laravel-configuration-objectified.svg?style=flat-square)](https://packagist.org/packages/rokde/laravel-configuration-objectified)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/rokde/laravel-configuration-objectified/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/rokde/laravel-configuration-objectified/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/rokde/laravel-configuration-objectified/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/rokde/laravel-configuration-objectified/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/rokde/laravel-configuration-objectified.svg?style=flat-square)](https://packagist.org/packages/rokde/laravel-configuration-objectified)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require rokde/laravel-configuration-objectified
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-configuration-objectified-migrations"
php artisan migrate
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-configuration-objectified-views"
```

## Usage

```php
$laravelConfigurationObjectified = new Rokde\LaravelConfigurationObjectified();
echo $laravelConfigurationObjectified->echoPhrase('Hello, Rokde!');
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

- [Robert Kummer](https://github.com/rokde)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
