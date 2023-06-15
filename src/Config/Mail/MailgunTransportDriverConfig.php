<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Mail;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasTransport;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class MailgunTransportDriverConfig extends Config
{
    use HasTransport;

    public static function make(): static
    {
        return (new static())
            ->transport('mailgun');
    }
}
