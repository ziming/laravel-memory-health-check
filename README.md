# Server Memory Health Check for Spatie Laravel Health and Oh Dear

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ziming/laravel-memory-health-check.svg?style=flat-square)](https://packagist.org/packages/ziming/laravel-memory-health-check)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ziming/laravel-memory-health-check/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ziming/laravel-memory-health-check/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ziming/laravel-memory-health-check/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ziming/laravel-memory-health-check/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ziming/laravel-memory-health-check.svg?style=flat-square)](https://packagist.org/packages/ziming/laravel-memory-health-check)

Memory Usage Health Check for [Spatie Laravel Health](https://github.com/spatie/laravel-health) Package. Which also works with
[Oh Dear](https://ohdear.app/?via=laravel-health-memory) monitoring service.

In the future more kinds of memory health checks may be added.

The memory usage code is shamelessly copied from Laravel Pulse.

Support Darwin, Linux, Windows and BSD based systems.

## Support us

You can donate to my github sponsor or use my referral link for [Oh Dear](https://ohdear.app/?via=laravel-health-memory) so 
I get a small reward if you become a paid customer in the future. This comes at no extra cost to you and helps support my open source work.


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
        ->warnWhenUsedMemoryIsAbovePercentage(85)
        ->failWhenUsedMemoryIsAbovePercentage(95),
]);
```

## Screenshots

In Laravel Health, it will look like this

<img width="798" height="280" alt="laravel health memory usage percentage" src="https://github.com/user-attachments/assets/25f4558d-d4f6-40ee-83e3-032332cff7fb" />

In [Oh Dear](https://ohdear.app/?via=laravel-health-memory), it will look like this

<img width="788" height="84" alt="Oh Dear memory usage percentage" src="https://github.com/user-attachments/assets/8fcdf2b6-a11e-4a0e-9cd8-592721deb056" />

<img width="1880" height="614" alt="Oh Dear memory usage percentage event logs" src="https://github.com/user-attachments/assets/0d33e876-75bc-499a-8d43-f78d6795c0be" />

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
