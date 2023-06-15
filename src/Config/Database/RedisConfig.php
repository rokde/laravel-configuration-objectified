<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Database;

use Illuminate\Support\Str;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class RedisConfig extends Config
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->client(env('REDIS_CLIENT', 'phpredis'))
            ->options(
                cluster: env('REDIS_CLUSTER', 'redis'),
                prefix: env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
            )
            ->connection(RedisConnectionOptions::makeDefault())
            ->cache(
                RedisConnectionOptions::makeDefault()
                    ->database(env('REDIS_CACHE_DB', '1'))
            );
    }

    public function client(string $client): self
    {
        $this->config->put('client', $client);

        return $this;
    }

    public function options(string $cluster, string $prefix): self
    {
        $this->config->put('options', compact('cluster', 'prefix'));

        return $this;
    }

    public function connection(RedisConnectionOptions $options): self
    {
        $this->config->put('default', $options);

        return $this;
    }

    public function cache(RedisConnectionOptions $options): self
    {
        $this->config->put('cache', $options);

        return $this;
    }
}
