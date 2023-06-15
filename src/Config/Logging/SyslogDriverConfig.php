<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Logging;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class SyslogDriverConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('syslog');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->level(env('LOG_LEVEL', 'debug'))
            ->facility(LOG_USER)
            ->replacePlaceholders();
    }

    public function level(string $level): self
    {
        $this->config->put('level', $level);

        return $this;
    }

    public function facility(int|string $facility): self
    {
        $this->config->put('facility', (int) $facility);

        return $this;
    }

    public function replacePlaceholders(bool|string $replacePlaceholders = true): self
    {
        $this->config->put('replace_placeholders', (bool) $replacePlaceholders);

        return $this;
    }
}
