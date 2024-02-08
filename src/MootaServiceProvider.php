<?php

declare(strict_types=1);

namespace FromHome\Moota;

use Saloon\HttpSender\HttpSender;
use Spatie\LaravelPackageTools\Package;
use FromHome\Moota\Http\Integrations\MootaConnector;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class MootaServiceProvider extends PackageServiceProvider
{
    public function registeringPackage(): void
    {
        $this->app->singleton(HttpSender::class, fn () => new HttpSender());

        $this->app->singleton(MootaConnector::class, function (): MootaConnector {
            return new MootaConnector(
                \config('services.moota.token', ''),
            );
        });
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-moota')
            ->hasConfigFile()
            ->hasMigration('create_moota_table');
    }
}
