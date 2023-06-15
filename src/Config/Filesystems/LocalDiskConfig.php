<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Filesystems;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class LocalDiskConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('local');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->root(storage_path('app'))
            ->throw(false);
    }

    public function root(string $root): self
    {
        $this->config->put('root', $root);

        return $this;
    }

    public function url(string $url): self
    {
        $this->config->put('url', $url);

        return $this;
    }

    public function visibility(string $visibility): self
    {
        $this->config->put('visibility', $visibility);

        return $this;
    }

    public function throw(bool|string $throw = true): self
    {
        $this->config->put('throw', (bool) $throw);

        return $this;
    }
}
