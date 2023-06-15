<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Mail;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasTransport;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class SendmailTransportDriverConfig extends Config
{
    use HasTransport;

    public static function make(): static
    {
        return (new static())
            ->transport('sendmail');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->path(env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'));
    }

    public function path(string $path): self
    {
        $this->config->put('path', $path);

        return $this;
    }
}
