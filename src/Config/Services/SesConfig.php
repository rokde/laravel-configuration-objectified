<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Services;

use Rokde\LaravelConfigurationObjectified\Config\Config;

class SesConfig extends Config
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->key(key: env('AWS_ACCESS_KEY_ID'))
            ->secret(secret: env('AWS_SECRET_ACCESS_KEY'))
            ->region(region: env('AWS_DEFAULT_REGION', 'us-east-1'));
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
}
