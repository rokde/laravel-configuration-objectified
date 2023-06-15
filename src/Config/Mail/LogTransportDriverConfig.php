<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Mail;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasTransport;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class LogTransportDriverConfig extends Config
{
    use HasTransport;

    public static function make(): static
    {
        return (new static())
            ->transport('log');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->channel(env('MAIL_LOG_CHANNEL'));
    }

    public function channel(?string $channel): self
    {
        $this->config->put('channel', $channel);

        return $this;
    }
}
