<?php

declare (strict_types=1);

use Ziming\LaravelMemoryHealthCheck\UsedMemoryCheck;

it('can measure memory usage', function (): void {
    expect(UsedMemoryCheck::getMemoryUsageStats())
        ->toHaveKey('used')
        ->toHaveKey('total');
});
