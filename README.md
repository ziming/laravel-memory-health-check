# Server Memory Health Check for Spatie Laravel Health Check and Oh Dear

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ziming/laravel-memory-health-check.svg?style=flat-square)](https://packagist.org/packages/ziming/laravel-memory-health-check)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ziming/laravel-memory-health-check/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ziming/laravel-memory-health-check/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ziming/laravel-memory-health-check/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ziming/laravel-memory-health-check/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ziming/laravel-memory-health-check.svg?style=flat-square)](https://packagist.org/packages/ziming/laravel-memory-health-check)

Memory Usage Health Check for Spatie Laravel Health Check Package. In the future I aim to add Memory Load Health Check too.

The memory usage code is shamelessly copied from Laravel Pulse

## Support us

You can donate to my github sponsor or use my referral link for [Oh Dear](https://ohdear.app/?via=laravel-health-memory) so I get a small reward if you become a paid customer in the future. This comes at no extra cost to you and helps support my open source work.

https://ohdear.app/?via=laravel-health-memory

## Installation

You can install the package via composer:

```bash
composer require ziming/laravel-memory-health-check
```

## Usage

```php
// In your Laravel Health Service Provider register() method

use Spatie\Health\Facades\Health;
use Ziming\LaravelMemoryHealthCheck\UsedMemoryCheck;

Health::checks([
    UsedMemoryCheck::new()
        ->warnWhenUsedMemoryIsAbovePercentage(70)
        ->failWhenUsedMemoryIsAbovePercentage(90),
]);
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

- [ziming](https://github.com/ziming)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
