<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Logging;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class SlackDriverConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('slack');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->url(env('LOG_SLACK_WEBHOOK_URL'))
            ->username('Laravel Log')
            ->emoji(':boom:')
            ->level(env('LOG_LEVEL', 'critical'))
            ->replacePlaceholders();
    }

    public function url(?string $url): self
    {
        $this->config->put('url', $url);

        return $this;
    }

    public function username(string $username): self
    {
        $this->config->put('username', $username);

        return $this;
    }

    public function emoji(string $emoji): self
    {
        $this->config->put('emoji', $emoji);

        return $this;
    }

    public function level(string $level): self
    {
        $this->config->put('level', $level);

        return $this;
    }

    public function replacePlaceholders(bool|string $replacePlaceholders = true): self
    {
        $this->config->put('replace_placeholders', (bool) $replacePlaceholders);

        return $this;
    }
}
