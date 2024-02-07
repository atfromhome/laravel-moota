<?php

declare(strict_types=1);

namespace FromHome\Moota\Tests;

use FromHome\Moota\MootaServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\LaravelData\LaravelDataServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            MootaServiceProvider::class,
            LaravelDataServiceProvider::class,
        ];
    }
}
