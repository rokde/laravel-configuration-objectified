<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Broadcasting;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class PusherConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('pusher');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->key(key: env('PUSHER_APP_KEY'))
            ->secret(secret: env('PUSHER_APP_SECRET'))
            ->appId(appId: env('PUSHER_APP_ID'))
            ->options(options: PusherOptions::makeDefault())
            ->clientOptions([]);
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

    public function appId(?string $appId): self
    {
        $this->config->put('app_id', $appId);

        return $this;
    }

    public function options(PusherOptions $options): self
    {
        $this->config->put('options', $options);

        return $this;
    }

    /**
     * @return $this
     *
     * @see https://docs.guzzlephp.org/en/stable/request-options.html
     */
    public function clientOptions(array $options): self
    {
        $this->config->put('client_options', $options);

        return $this;
    }
}
