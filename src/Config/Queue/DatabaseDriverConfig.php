<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Queue;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class DatabaseDriverConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('database');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->table('jobs')
            ->queue('default')
            ->retryAfter(90)
            ->afterCommit(false);
    }

    public function table(string $table): self
    {
        $this->config->put('table', $table);

        return $this;
    }

    public function queue(string $queue): self
    {
        $this->config->put('queue', $queue);

        return $this;
    }

    public function retryAfter(int|string $retryAfter): self
    {
        $this->config->put('retry_after', (int) $retryAfter);

        return $this;
    }

    public function afterCommit(bool|string $afterCommit = true): self
    {
        $this->config->put('after_commit', (bool) $afterCommit);

        return $this;
    }
}
