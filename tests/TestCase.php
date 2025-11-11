<?php

declare(strict_types=1);

namespace Ziming\LaravelMemoryHealthCheck\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Ziming\LaravelMemoryHealthCheck\LaravelMemoryHealthCheckServiceProvider;

class TestCase extends Orchestra
{

    protected function getPackageProviders($app): array
    {
        return [
            LaravelMemoryHealthCheckServiceProvider::class,
        ];
    }
}
