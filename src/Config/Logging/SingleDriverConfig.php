<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Logging;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class SingleDriverConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('single');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->path(storage_path('logs/laravel.log'))
            ->level(env('LOG_LEVEL', 'debug'))
            ->replacePlaceholders();
    }

    public function path(string $path): self
    {
        $this->config->put('path', $path);

        return $this;
    }

    public function level(string $level): self
    {
        $this->config->put('level', $level);

        return $this;
    }

    public function replacePlaceholders(bool|string $replacePlaceholders = true): self
    {
        $this->config->put('replace_placeholders', (bool) $replacePlaceholders);

        return $this;
    }
}
