<?php

declare(strict_types=1);

namespace FromHome\Moota\Tests;

use FromHome\Moota\LaravelMoota;
use Saloon\Http\Faking\MockClient;
use FromHome\Moota\MootaServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\LaravelData\LaravelDataServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        MockClient::destroyGlobal();
    }

    protected function getPackageProviders($app): array
    {
        return [
            MootaServiceProvider::class,
            LaravelDataServiceProvider::class,
        ];
    }

    protected function defineRoutes($router): void
    {
        $router->group([], fn () => LaravelMoota::routes());
    }

    protected function defineDatabaseMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
