<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config;

use Rokde\LaravelConfigurationObjectified\Config\Broadcasting\AblyConfig;
use Rokde\LaravelConfigurationObjectified\Config\Broadcasting\LogConfig;
use Rokde\LaravelConfigurationObjectified\Config\Broadcasting\NullConfig;
use Rokde\LaravelConfigurationObjectified\Config\Broadcasting\PusherConfig;
use Rokde\LaravelConfigurationObjectified\Config\Broadcasting\RedisConfig;

class BroadcastingConfig extends Config implements ConfigurationIdentifier
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->defaultConnection(env('BROADCAST_DRIVER', 'null'))
            ->connection(
                connection: 'pusher',
                config: PusherConfig::makeDefault()
            )
            ->connection(
                connection: 'ably',
                config: AblyConfig::makeDefault()
            )
            ->connection(
                connection: 'redis',
                config: RedisConfig::makeDefault()
            )
            ->connection(
                connection: 'log',
                config: LogConfig::makeDefault()
            )
            ->connection(
                connection: 'null',
                config: NullConfig::makeDefault()
            );
    }

    /**
     * This option controls the default broadcaster that will be used by the
     * framework when an event needs to be broadcast. You may set this to
     * any of the connections defined in the "connections" array below.
     *
     * Supported: "pusher", "ably", "redis", "log", "null"
     *
     * @return $this
     */
    public function defaultConnection(string $connection): self
    {
        $this->config->put('default', $connection);

        return $this;
    }

    /**
     * Here you may define all of the broadcast connections that will be used
     * to broadcast events to other systems or over websockets. Samples of
     * each available type of connection are provided inside this array.
     *
     * @return $this
     */
    public function connection(string $connection, PusherConfig|AblyConfig|RedisConfig|LogConfig|NullConfig $config): self
    {
        $this->config->put('connections.'.$connection, $config);

        return $this;
    }

    public function identifier(): string
    {
        return 'broadcasting';
    }
}
