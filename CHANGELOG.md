# Changelog

All notable changes to `laravel-memory-health-check` will be documented in this file.

## 1.1.2 - 2026-04-04

### What's Changed

* Replaced backtick alias with shell_exec by @lasselehtinen in https://github.com/ziming/laravel-memory-health-check/pull/10
* Bump dependabot/fetch-metadata from 2.5.0 to 3.0.0 by @dependabot[bot] in https://github.com/ziming/laravel-memory-health-check/pull/9

### New Contributors

* @lasselehtinen made their first contribution in https://github.com/ziming/laravel-memory-health-check/pull/10

**Full Changelog**: https://github.com/ziming/laravel-memory-health-check/compare/1.1.1...1.1.2

## Fix memory check on Windows 11 24H2+ - 2026-03-28

### What's Changed

* Bump actions/checkout from 5 to 6 by @dependabot[bot] in https://github.com/ziming/laravel-memory-health-check/pull/2
* Bump ramsey/composer-install from 3 to 4 by @dependabot[bot] in https://github.com/ziming/laravel-memory-health-check/pull/5
* Fix Windows crash: replace wmic with PowerShell CIM (wmic removed in Windows 11 24H2+) by @Copilot in https://github.com/ziming/laravel-memory-health-check/pull/7
* Fix PHPStan type errors: string division in Windows memory fallback paths by @Copilot in https://github.com/ziming/laravel-memory-health-check/pull/8

**Full Changelog**: https://github.com/ziming/laravel-memory-health-check/compare/1.1.0...1.1.1

## Support Laravel 13 - 2026-03-17

### What's Changed

* Bump dependabot/fetch-metadata from 2.4.0 to 2.5.0 by @dependabot[bot] in https://github.com/ziming/laravel-memory-health-check/pull/3
* Add Laravel 13 compatibility by @Copilot in https://github.com/ziming/laravel-memory-health-check/pull/6

### New Contributors

* @Copilot made their first contribution in https://github.com/ziming/laravel-memory-health-check/pull/6

**Full Changelog**: https://github.com/ziming/laravel-memory-health-check/compare/1.0.2...1.1.0
