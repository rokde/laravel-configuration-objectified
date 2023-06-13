<?php

namespace Rokde\LaravelConfigurationObjectified;

use Rokde\LaravelConfigurationObjectified\Commands\LaravelConfigurationObjectifiedCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasCommand(LaravelConfigurationObjectifiedCommand::class);
    }
}
