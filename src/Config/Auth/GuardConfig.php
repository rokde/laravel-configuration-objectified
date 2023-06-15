<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Auth;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class GuardConfig extends Config
{
    use HasDriver;

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->driver(driver: 'session')
            ->provider(provider: 'users');
    }

    public function provider(string $provider): self
    {
        $this->config->put('provider', $provider);

        return $this;
    }
}
