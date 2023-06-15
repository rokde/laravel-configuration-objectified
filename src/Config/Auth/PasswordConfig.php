<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Auth;

use Rokde\LaravelConfigurationObjectified\Config\Config;

class PasswordConfig extends Config
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->provider(provider: 'users')
            ->table(table: 'password_reset_tokens')
            ->expire(expireInMinutes: 60)
            ->throttle(throttleInSeconds: 60);
    }

    public function provider(string $provider): self
    {
        $this->config->put('provider', $provider);

        return $this;
    }

    public function table(string $table): self
    {
        $this->config->put('table', $table);

        return $this;
    }

    public function expire(int $expireInMinutes): self
    {
        $this->config->put('expire', $expireInMinutes);

        return $this;
    }

    public function throttle(int $throttleInSeconds): self
    {
        $this->config->put('throttle', $throttleInSeconds);

        return $this;
    }
}
