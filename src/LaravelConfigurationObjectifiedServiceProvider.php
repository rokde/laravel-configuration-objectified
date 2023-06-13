<?php

namespace Rokde\LaravelConfigurationObjectified;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Rokde\LaravelConfigurationObjectified\Commands\LaravelConfigurationObjectifiedCommand;

class LaravelConfigurationObjectifiedServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-configuration-objectified')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-configuration-objectified_table')
            ->hasCommand(LaravelConfigurationObjectifiedCommand::class);
    }
}
