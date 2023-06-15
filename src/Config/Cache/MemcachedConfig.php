<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Cache;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class MemcachedConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('memcached');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->persistentId(persistentId: env('MEMCACHED_PERSISTENT_ID'))
            ->sasl(
                username: env('MEMCACHED_USERNAME'),
                password: env('MEMCACHED_PASSWORD'),
            )
            ->options([])
            ->server(
                host: env('MEMCACHED_HOST', '127.0.0.1'),
                port: env('MEMCACHED_PORT', 11211),
                weight: 100,
            );
    }

    public function persistentId(?string $persistentId): self
    {
        $this->config->put('persistent_id', $persistentId);

        return $this;
    }

    public function sasl(?string $username, ?string $password): self
    {
        $this->config->put('sasl', [$username, $password]);

        return $this;
    }

    public function options(array $options): self
    {
        $this->config->put('options', $options);

        return $this;
    }

    public function server(string $host, int $port = 11211, int $weight = 100): self
    {
        $servers = $this->config->get('servers', []);
        $servers[] = [
            'host' => $host,
            'port' => $port,
            'weight' => $weight,
        ];

        $this->config->put('servers', $servers);

        return $this;
    }
}
