<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Broadcasting;

use Rokde\LaravelConfigurationObjectified\Config\Config;

class PusherOptions extends Config
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->cluster(cluster: env('PUSHER_APP_CLUSTER'))
            ->host(host: env('PUSHER_HOST') ?: 'api-'.env('PUSHER_APP_CLUSTER', 'mt1').'.pusher.com')
            ->port((int) env('PUSHER_PORT', 443))
            ->scheme(env('PUSHER_SCHEME', 'https'))
            ->encrypted();
    }

    public function cluster(?string $cluster): self
    {
        $this->config->put('cluster', $cluster);

        return $this;
    }

    public function host(string $host): self
    {
        $this->config->put('host', $host);

        return $this;
    }

    public function port(int $port): self
    {
        $this->config->put('port', $port);

        return $this;
    }

    public function scheme(string $scheme): self
    {
        $this->config->put('scheme', $scheme);
        $this->useTls($scheme === 'https');

        return $this;
    }

    public function encrypted(bool|string $encrypted = true): self
    {
        $this->config->put('encrypted', (bool) $encrypted);

        return $this;
    }

    public function useTls(bool|string $useTls = true): self
    {
        $this->config->put('useTLS', (bool) $useTls);

        return $this;
    }
}
