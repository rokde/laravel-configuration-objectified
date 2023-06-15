<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Broadcasting;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class NullConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('null');
    }
}
