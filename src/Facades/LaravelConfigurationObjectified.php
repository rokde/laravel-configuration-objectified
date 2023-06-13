<?php

namespace Rokde\LaravelConfigurationObjectified\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rokde\LaravelConfigurationObjectified\LaravelConfigurationObjectified
 */
class LaravelConfigurationObjectified extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Rokde\LaravelConfigurationObjectified\LaravelConfigurationObjectified::class;
    }
}
