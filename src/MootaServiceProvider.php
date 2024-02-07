<?php

declare(strict_types=1);

namespace FromHome\Moota;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class MootaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-moota')
            ->hasConfigFile()
            ->hasMigration('create_moota_table');
    }
}
