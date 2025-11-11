<?php

declare(strict_types=1);

namespace Ziming\LaravelMemoryHealthCheck;

use RuntimeException;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class UsedMemoryCheck extends Check
{

    protected int $warningThreshold = 70;

    protected int $errorThreshold = 90;

    public function run(): Result
    {
        $serverMemoryUsageStats = $this->getMemoryUsageStats();

        $serverMemoryUsagePercentage = $this->getMemoryUsagePercentage($serverMemoryUsageStats);

        $result = Result::make()
            ->meta([
                'memory_used_percentage' => $serverMemoryUsagePercentage,
                'memory_used_mb' => $serverMemoryUsageStats['used'],
                'memory_total_mb' => $serverMemoryUsageStats['total'],
            ])
            ->shortSummary($serverMemoryUsagePercentage.'%');

        if ($serverMemoryUsagePercentage > $this->errorThreshold) {
            return $result->failed("Server memory is almost full ({$serverMemoryUsagePercentage}% used).");
        }

        if ($serverMemoryUsagePercentage > $this->warningThreshold) {
            return $result->warning("Server memory is almost full ({$serverMemoryUsagePercentage}% used).");
        }

        return $result->ok();
    }

    public function warnWhenUsedMemoryIsAbovePercentage(int $percentage): self
    {
        $this->warningThreshold = $percentage;

        return $this;
    }

    public function failWhenUsedMemoryIsAbovePercentage(int $percentage): self
    {
        $this->errorThreshold = $percentage;

        return $this;
    }

    public static function getMemoryUsageStats(): array
    {
        // Credits to Laravel Pulse. Copied from there
        $memoryTotal = match (PHP_OS_FAMILY) {
            'Darwin' => intval(`sysctl hw.memsize | grep -Eo '[0-9]+'` / 1024 / 1024),
            'Linux' => intval(`cat /proc/meminfo | grep MemTotal | grep -E -o '[0-9]+'` / 1024),
            'Windows' => intval(((int) trim(`wmic ComputerSystem get TotalPhysicalMemory | more +1`)) / 1024 / 1024),
            'BSD' => intval(`sysctl hw.physmem | grep -Eo '[0-9]+'` / 1024 / 1024),
            default => throw new RuntimeException('The memory usage health check does not currently support '.PHP_OS_FAMILY),
        };

        $memoryUsed = match (PHP_OS_FAMILY) {
            'Darwin' => $memoryTotal - intval(intval(`vm_stat | grep 'Pages free' | grep -Eo '[0-9]+'`) * intval(`pagesize`) / 1024 / 1024), // MB
            'Linux' => $memoryTotal - intval(`cat /proc/meminfo | grep MemAvailable | grep -E -o '[0-9]+'` / 1024), // MB
            'Windows' => $memoryTotal - intval(((int) trim(`wmic OS get FreePhysicalMemory | more +1`)) / 1024), // MB
            'BSD' => intval(intval(`( sysctl vm.stats.vm.v_cache_count | grep -Eo '[0-9]+' ; sysctl vm.stats.vm.v_inactive_count | grep -Eo '[0-9]+' ; sysctl vm.stats.vm.v_active_count | grep -Eo '[0-9]+' ) | awk '{s+=$1} END {print s}'`) * intval(`pagesize`) / 1024 / 1024), // MB
            default => throw new RuntimeException('The memory usage health check does not currently support '.PHP_OS_FAMILY),
        };

        return [
            'total' => $memoryTotal,
            'used' => $memoryUsed,
        ];
    }

    protected function getMemoryUsagePercentage(?array $memoryUsageStats = null): float
    {
        $memoryStats = $memoryUsageStats ?: $this->getMemoryUsageStats();

        return round(($memoryStats['used'] / $memoryStats['total']) * 100);
    }
}
