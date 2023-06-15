<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Database;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class PgsqlConnectionOptions extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('pgsql');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->url(env('DATABASE_URL'))
            ->host(env('DB_HOST', '127.0.0.1'))
            ->port(env('DB_PORT', 5432))
            ->database(env('DB_DATABASE', 'forge'))
            ->username(env('DB_USERNAME', 'forge'))
            ->password(env('DB_PASSWORD', ''))
            ->charset('utf8')
            ->prefix('')
            ->prefixIndexes()
            ->searchPath('public')
            ->sslMode('prefer');
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

    public function username(string $username): self
    {
        $this->config->put('username', $username);

        return $this;
    }

    public function password(string $password): self
    {
        $this->config->put('password', $password);

        return $this;
    }

    public function charset(string $charset): self
    {
        $this->config->put('charset', $charset);

        return $this;
    }

    public function prefix(string $prefix): self
    {
        $this->config->put('prefix', $prefix);

        return $this;
    }

    public function prefixIndexes(bool|string $prefixIndexes = true): self
    {
        $this->config->put('prefix_indexes', (bool) $prefixIndexes);

        return $this;
    }

    public function searchPath(string $searchPath): self
    {
        $this->config->put('search_path', $searchPath);

        return $this;
    }

    public function sslMode(string $sslMode): self
    {
        $this->config->put('sslmode', $sslMode);

        return $this;
    }
}
