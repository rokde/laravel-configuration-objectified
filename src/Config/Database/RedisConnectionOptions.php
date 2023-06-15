<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Database;

use Rokde\LaravelConfigurationObjectified\Config\Config;

class RedisConnectionOptions extends Config
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->url(env('REDIS_URL'))
            ->host(env('REDIS_HOST', '127.0.0.1'))
            ->username(env('REDIS_USERNAME'))
            ->password(env('REDIS_PASSWORD'))
            ->port(env('REDIS_PORT', '6379'))
            ->database(env('REDIS_DB', '0'));
    }

    public function url(?string $url): self
    {
        $this->config->put('url', $url);

        return $this;
    }

    public function host(string $host): self
    {
        $this->config->put('host', $host);

        return $this;
    }

    public function username(?string $username): self
    {
        $this->config->put('username', $username);

        return $this;
    }

    public function password(?string $password): self
    {
        $this->config->put('password', $password);

        return $this;
    }

    public function port(int|string $port): self
    {
        $this->config->put('port', (int) $port);

        return $this;
    }

    public function database(string $database): self
    {
        $this->config->put('database', $database);

        return $this;
    }
}
