<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Mail;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasTransport;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class SesTransportDriverConfig extends Config
{
    use HasTransport;

    public static function make(): static
    {
        return (new static())
            ->transport('ses');
    }
}
