<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

abstract class Config
{
    protected Collection $config;

    public static function make(): static
    {
        return new static();
    }

    public static function makeDefault(): static
    {
        return static::make();
    }

    protected function __construct()
    {
        $this->config = collect();
    }

    public function toArray(): array
    {
        return Arr::undot($this->config->mapWithKeys(function ($config, $key) {
            if ($config instanceof Config) {
                return [$key => $config->toArray()];
            }

            return [$key => $config];
        })->all());
    }
}
