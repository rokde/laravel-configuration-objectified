<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Database;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class SqliteConnectionOptions extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('sqlite');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->url(env('DATABASE_URL'))
            ->database(env('DB_DATABASE', database_path('database.sqlite')))
            ->prefix('')
            ->foreignKeyConstraints(env('DB_FOREIGN_KEYS', true));
    }

    public function url(?string $url): self
    {
        $this->config->put('url', $url);

        return $this;
    }

    public function database(string $database): self
    {
        $this->config->put('database', $database);

        return $this;
    }

    public function prefix(string $prefix): self
    {
        $this->config->put('prefix', $prefix);

        return $this;
    }

    public function foreignKeyConstraints(bool|string $foreignKeyConstraints = true): self
    {
        $this->config->put('foreign_key_constraints', (bool) $foreignKeyConstraints);

        return $this;
    }
}
