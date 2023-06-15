<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Filesystems;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class S3DiskConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('s3');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->key(env('AWS_ACCESS_KEY_ID'))
            ->secret(env('AWS_SECRET_ACCESS_KEY'))
            ->region(env('AWS_DEFAULT_REGION'))
            ->bucket(env('AWS_BUCKET'))
            ->url(env('AWS_URL'))
            ->endpoint(env('AWS_ENDPOINT'))
            ->usePathStyleEndpoint(env('AWS_USE_PATH_STYLE_ENDPOINT', false))
            ->throw(false);
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

    public function region(?string $region): self
    {
        $this->config->put('region', $region);

        return $this;
    }

    public function bucket(?string $bucket): self
    {
        $this->config->put('bucket', $bucket);

        return $this;
    }

    public function url(?string $url): self
    {
        $this->config->put('url', $url);

        return $this;
    }

    public function endpoint(?string $endpoint): self
    {
        $this->config->put('endpoint', $endpoint);

        return $this;
    }

    public function usePathStyleEndpoint(bool|string $usePathStyleEndpoint = true): self
    {
        $this->config->put('use_path_style_endpoint', (bool) $usePathStyleEndpoint);

        return $this;
    }

    public function throw(bool|string $throw = true): self
    {
        $this->config->put('throw', (bool) $throw);

        return $this;
    }
}
