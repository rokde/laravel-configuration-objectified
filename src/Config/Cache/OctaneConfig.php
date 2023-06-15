<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Cache;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class OctaneConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('octane');
    }
}
