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

## Usage

Go to your `config` folder in your laravel project and replace the `return []` statement with this (e.g. `app.php`):
```php
<?php

use Rokde\LaravelConfigurationObjectified\Config\AppConfig;

return AppConfig::makeDefault()
    ->toArray();
```

If you want to configure something you can use typed methods. For example changing the locale in `app.php` will result in this:
```php
<?php

use Rokde\LaravelConfigurationObjectified\Config\AppConfig;

return AppConfig::makeDefault()
    ->locale('de')
    ->toArray();
```

These are the following Config classes with their corresponding config file

| file             | Config                                |
|------------------|---------------------------------------|
| app.php          | `AppConfig::makeDefault()->toArray()` |
| auth.php         | `AuthConfig::makeDefault()->toArray()` |
| broadcasting.php | `BroadcastingConfig::makeDefault()->toArray()` |
| cache.php        | `CacheConfig::makeDefault()->toArray()` |
| cors.php         | `CorsConfig::makeDefault()->toArray()` |
| database.php     | `DatabaseConfig::makeDefault()->toArray()` |
| filesystem.php   | `FilesystemsConfig::makeDefault()->toArray()` |
| hashing.php      | `HashingConfig::makeDefault()->toArray()` |
| logging.php      | `LoggingConfig::makeDefault()->toArray()` |
| mail.php         | `MailConfig::makeDefault()->toArray()` |
| queue.php        | `QueueConfig::makeDefault()->toArray()` |
| sanctum.php      | `SanctumConfig::makeDefault()->toArray()` |
| services.php     | `ServicesConfig::makeDefault()->toArray()` |
| session.php      | `SessionConfig::makeDefault()->toArray()` |
| view.php         | `ViewConfig::makeDefault()->toArray()` |


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
