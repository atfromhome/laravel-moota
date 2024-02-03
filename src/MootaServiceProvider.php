<?php

declare(strict_types=1);

namespace FromHome\Moota;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class MootaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-moota')
            ->hasConfigFile()
            ->hasMigration('create_laravel-moota_table');
    }
}
