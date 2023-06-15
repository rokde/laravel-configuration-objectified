<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Cache;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class RedisConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('redis');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->connection(connection: 'cache')
            ->lockConnection(lockConnection: 'default');
    }

    public function connection(string $connection): self
    {
        $this->config->put('connection', $connection);

        return $this;
    }

    public function lockConnection(string $lockConnection): self
    {
        $this->config->put('lock_connection', $lockConnection);

        return $this;
    }
}
