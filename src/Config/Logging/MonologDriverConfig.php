<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Logging;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class MonologDriverConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('monolog');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault();
    }

    public function level(string $level): self
    {
        $this->config->put('level', $level);

        return $this;
    }

    public function handler(string $handler, array $with = []): self
    {
        $this->config->put('handler', $handler);
        if (! empty($with)) {
            $this->config->put('handler_with', $with);
        }

        return $this;
    }

    public function processor($processor): self
    {
        $processors = $this->config->get('processors', []);
        $processors[] = $processor;

        $this->config->put('processors', $processors);

        return $this;
    }

    public function formatter($formatter, array $with = []): self
    {
        $this->config->put('formatter', $formatter);
        if (! empty($with)) {
            $this->config->put('with', $with);
        }

        return $this;
    }
}
