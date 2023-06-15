<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config;

use Illuminate\Support\Str;
use Rokde\LaravelConfigurationObjectified\Config\Cache\ApcConfig;
use Rokde\LaravelConfigurationObjectified\Config\Cache\ArrayConfig;
use Rokde\LaravelConfigurationObjectified\Config\Cache\DatabaseConfig;
use Rokde\LaravelConfigurationObjectified\Config\Cache\DynamodbConfig;
use Rokde\LaravelConfigurationObjectified\Config\Cache\FileConfig;
use Rokde\LaravelConfigurationObjectified\Config\Cache\MemcachedConfig;
use Rokde\LaravelConfigurationObjectified\Config\Cache\OctaneConfig;
use Rokde\LaravelConfigurationObjectified\Config\Cache\RedisConfig;

class CacheConfig extends Config implements ConfigurationIdentifier
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->defaultDriver(env('CACHE_DRIVER', 'file'))
            ->store(connection: 'apc', config: ApcConfig::makeDefault())
            ->store(connection: 'array', config: ArrayConfig::makeDefault())
            ->store(connection: 'database', config: DatabaseConfig::makeDefault())
            ->store(connection: 'file', config: FileConfig::makeDefault())
            ->store(connection: 'memcached', config: MemcachedConfig::makeDefault())
            ->store(connection: 'redis', config: RedisConfig::makeDefault())
            ->store(connection: 'dynamodb', config: DynamodbConfig::makeDefault())
            ->store(connection: 'octane', config: OctaneConfig::makeDefault())
            ->prefix(env('CACHE_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_cache_'));
    }

    /**
     * This option controls the default cache connection that gets used while
     * using this caching library. This connection is used when another is
     * not explicitly specified when executing a given caching function.
     *
     * @return $this
     */
    public function defaultDriver(string $driver): self
    {
        $this->config->put('default', $driver);

        return $this;
    }

    /**
     * Here you may define all of the cache "stores" for your application as
     * well as their drivers. You may even define multiple stores for the
     * same cache driver to group types of items stored in your caches.
     *
     * Supported drivers: "apc", "array", "database", "file",
     *         "memcached", "redis", "dynamodb", "octane", "null"
     *
     * @return $this
     */
    public function store(string $connection, ApcConfig|ArrayConfig|DatabaseConfig|DynamodbConfig|FileConfig|MemcachedConfig|OctaneConfig|RedisConfig|Config $config): self
    {
        $this->config->put('stores.'.$connection, $config);

        return $this;
    }

    /**
     * When utilizing the APC, database, memcached, Redis, or DynamoDB cache
     * stores there might be other applications using the same cache. For
     * that reason, you may prefix every cache key to avoid collisions.
     *
     * @return $this
     */
    public function prefix(string $prefix): self
    {
        $this->config->put('prefix', $prefix);

        return $this;
    }

    public function identifier(): string
    {
        return 'cache';
    }
}
