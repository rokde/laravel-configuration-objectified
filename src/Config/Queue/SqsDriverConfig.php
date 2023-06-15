<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Queue;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class SqsDriverConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('sqs');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->key(env('AWS_ACCESS_KEY_ID'))
            ->secret(env('AWS_SECRET_ACCESS_KEY'))
            ->prefix(env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'))
            ->queue('default')
            ->suffix(env('SQS_SUFFIX'))
            ->region(env('AWS_DEFAULT_REGION', 'us-east-1'))
            ->afterCommit(false);
    }

    public function key(?string $key): self
    {
        $this->config->put('key', $key);

        return $this;
    }

    public function secret(?string $secret): self
    {
        $this->config->put('secret', $secret);

        return $this;
    }

    public function prefix(?string $prefix): self
    {
        $this->config->put('prefix', $prefix);

        return $this;
    }

    public function queue(string $queue): self
    {
        $this->config->put('queue', $queue);

        return $this;
    }

    public function suffix(?string $suffix): self
    {
        $this->config->put('suffix', $suffix);

        return $this;
    }

    public function region(string $region): self
    {
        $this->config->put('region', $region);

        return $this;
    }

    public function afterCommit(bool|string $afterCommit = true): self
    {
        $this->config->put('after_commit', (bool) $afterCommit);

        return $this;
    }
}
