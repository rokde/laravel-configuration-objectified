<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Cache;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class DynamodbConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('dynamodb');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->key(key: env('AWS_ACCESS_KEY_ID'))
            ->secret(secret: env('AWS_SECRET_ACCESS_KEY'))
            ->region(region: env('AWS_DEFAULT_REGION', 'us-east-1'))
            ->table(table: env('DYNAMODB_CACHE_TABLE', 'cache'))
            ->endpoint(endpoint: env('DYNAMODB_ENDPOINT'));
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

    public function region(string $region): self
    {
        $this->config->put('region', $region);

        return $this;
    }

    public function table(string $table): self
    {
        $this->config->put('table', $table);

        return $this;
    }

    public function endpoint(?string $endpoint): self
    {
        $this->config->put('endpoint', $endpoint);

        return $this;
    }
}
