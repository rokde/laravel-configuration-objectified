<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config;

use Rokde\LaravelConfigurationObjectified\Config\Queue\BeanstalkdDriverConfig;
use Rokde\LaravelConfigurationObjectified\Config\Queue\DatabaseDriverConfig;
use Rokde\LaravelConfigurationObjectified\Config\Queue\RedisDriverConfig;
use Rokde\LaravelConfigurationObjectified\Config\Queue\SqsDriverConfig;
use Rokde\LaravelConfigurationObjectified\Config\Queue\SyncDriverConfig;

class QueueConfig extends Config implements ConfigurationIdentifier
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->defaultConnection(env('QUEUE_CONNECTION', 'sync'))
            ->connection(connection: 'sync', config: SyncDriverConfig::makeDefault())
            ->connection(connection: 'database', config: DatabaseDriverConfig::makeDefault())
            ->connection(connection: 'beanstalkd', config: BeanstalkdDriverConfig::makeDefault())
            ->connection(connection: 'sqs', config: SqsDriverConfig::makeDefault())
            ->connection(connection: 'redis', config: RedisDriverConfig::makeDefault())
            ->batching(
                database: env('DB_CONNECTION', 'mysql'),
                table: 'job_batches',
            )
            ->failed(
                driver: env('QUEUE_FAILED_DRIVER', 'database-uuids'),
                database: env('DB_CONNECTION', 'mysql'),
                table: 'failed_jobs',
            );
    }

    /**
     * Laravel's queue API supports an assortment of back-ends via a single
     * API, giving you convenient access to each back-end using the same
     * syntax for every one. Here you may define a default connection.
     *
     * @return $this
     */
    public function defaultConnection(string $default): self
    {
        $this->config->put('default', $default);

        return $this;
    }

    /**
     * Here you may configure the connection information for each server that
     * is used by your application. A default configuration has been added
     * for each back-end shipped with Laravel. You are free to add more.
     *
     * Drivers: "sync", "database", "beanstalkd", "sqs", "redis", "null"
     *
     * @return $this
     */
    public function connection(string $connection, Config $config): self
    {
        $this->config->put('connections.'.$connection, $config);

        return $this;
    }

    /**
     * The following options configure the database and table that store job
     * batching information. These options can be updated to any database
     * connection and table which has been defined by your application.
     *
     * @return $this
     */
    public function batching(string $database, string $table): self
    {
        $this->config->put('batching', compact('database', 'table'));

        return $this;
    }

    /**
     * The following options configure the database and table that store job
     * batching information. These options can be updated to any database
     * connection and table which has been defined by your application.
     *
     * @return $this
     */
    public function failed(string $driver, string $database, string $table): self
    {
        $this->config->put('failed', compact('driver', 'database', 'table'));

        return $this;
    }

    public function identifier(): string
    {
        return 'queue';
    }
}
