<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Cache;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class DatabaseConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('database');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->table(table: 'cache')
            ->connection(null)
            ->lockConnection(null);
    }

    public function table(string $table): self
    {
        $this->config->put('table', $table);

        return $this;
    }

    public function connection(?string $connection): self
    {
        $this->config->put('connection', $connection);

        return $this;
    }

    public function lockConnection(?string $lockConnection): self
    {
        $this->config->put('lock_connection', $lockConnection);

        return $this;
    }
}
