<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Cache;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class FileConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('file');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->path(path: storage_path('framework/cache/data'))
            ->lockPath(lockPath: storage_path('framework/cache/data'));
    }

    public function path(string $path): self
    {
        $this->config->put('path', $path);

        return $this;
    }

    public function lockPath(string $lockPath): self
    {
        $this->config->put('lock_path', $lockPath);

        return $this;
    }
}
