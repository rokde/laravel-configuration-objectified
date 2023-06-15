<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Cache;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class ArrayConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('array');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->serialize(serialize: false);
    }

    public function serialize(bool|string $serialize = true): self
    {
        $this->config->put('serialize', (bool) $serialize);

        return $this;
    }
}
