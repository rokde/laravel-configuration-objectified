<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Queue;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class RedisDriverConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('redis');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->connection('default')
            ->queue(env('REDIS_QUEUE', 'default'))
            ->retryAfter(90)
            ->blockFor(null)
            ->afterCommit(false);
    }

    public function connection(string $connection): self
    {
        $this->config->put('connection', $connection);

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

    public function blockFor(int|string|null $blockFor): self
    {
        $this->config->put('block_for', $blockFor === null ? null : (int) $blockFor);

        return $this;
    }

    public function afterCommit(bool|string $afterCommit = true): self
    {
        $this->config->put('after_commit', (bool) $afterCommit);

        return $this;
    }
}
