<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Broadcasting;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class AblyConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('ably');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->key(key: env('ABLY_KEY'));
    }

    public function key(?string $key): self
    {
        $this->config->put('key', $key);

        return $this;
    }
}
