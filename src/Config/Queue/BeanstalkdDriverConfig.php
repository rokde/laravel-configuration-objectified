<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Queue;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class BeanstalkdDriverConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('beanstalkd');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->host('localhost')
            ->queue('default')
            ->retryAfter(90)
            ->blockFor(0)
            ->afterCommit(false);
    }

    public function host(string $host): self
    {
        $this->config->put('host', $host);

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

    public function blockFor(int|string $blockFor): self
    {
        $this->config->put('block_for', (int) $blockFor);

        return $this;
    }

    public function afterCommit(bool|string $afterCommit = true): self
    {
        $this->config->put('after_commit', (bool) $afterCommit);

        return $this;
    }
}
