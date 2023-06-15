<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Database;

use PDO;
use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class MysqlConnectionOptions extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('mysql');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->url(env('DATABASE_URL'))
            ->host(env('DB_HOST', '127.0.0.1'))
            ->port(env('DB_PORT', 3306))
            ->database(env('DB_DATABASE', 'forge'))
            ->username(env('DB_USERNAME', 'forge'))
            ->password(env('DB_PASSWORD', ''))
            ->unixSocket(env('DB_SOCKET', ''))
            ->charset('utf8mb4')
            ->collation('utf8mb4_unicode_ci')
            ->prefix('')
            ->prefixIndexes()
            ->strict()
            ->engine(null)
            ->options(
                extension_loaded('pdo_mysql')
                    ? array_filter([PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA')])
                    : []
            );
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

    public function unixSocket(string $unixSocket): self
    {
        $this->config->put('unix_socket', $unixSocket);

        return $this;
    }

    public function charset(string $charset): self
    {
        $this->config->put('charset', $charset);

        return $this;
    }

    public function collation(string $collation): self
    {
        $this->config->put('collation', $collation);

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

    public function strict(bool|string $strict = true): self
    {
        $this->config->put('strict', (bool) $strict);

        return $this;
    }

    public function engine(?string $engine): self
    {
        $this->config->put('engine', (bool) $engine);

        return $this;
    }

    public function options(array $options): self
    {
        $this->config->put('options', $options);

        return $this;
    }
}
