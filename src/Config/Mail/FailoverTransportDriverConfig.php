<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Mail;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasTransport;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class FailoverTransportDriverConfig extends Config
{
    use HasTransport;

    public static function make(): static
    {
        return (new static())
            ->transport('failover');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->mailer('smtp')
            ->mailer('log');
    }

    public function mailer(string $mailer): self
    {
        $mailers = $this->config->get('mailers', []);
        $mailers[] = $mailer;

        $this->config->put('mailers', $mailers);

        return $this;
    }
}
