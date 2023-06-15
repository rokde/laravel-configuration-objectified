<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Mail;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasTransport;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class SmtpTransportDriverConfig extends Config
{
    use HasTransport;

    public static function make(): static
    {
        return (new static())
            ->transport('smtp');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->url(env('MAIL_URL'))
            ->host(env('MAIL_HOST', 'smtp.mailgun.org'))
            ->port(env('MAIL_PORT', 587))
            ->encryption(env('MAIL_ENCRYPTION', 'tls'))
            ->username(env('MAIL_USERNAME'))
            ->password(env('MAIL_PASSWORD'))
            ->timeout(null)
            ->localDomain(env('MAIL_EHLO_DOMAIN'));
    }

    public function url(?string $url): self
    {
        $this->config->put('url', $url);

        return $this;
    }

    public function host(string $host): self
    {
        $this->config->put('key', $host);

        return $this;
    }

    public function port(int|string $port): self
    {
        $this->config->put('port', (int) $port);

        return $this;
    }

    public function encryption(?string $encryption): self
    {
        $this->config->put('encryption', $encryption);

        return $this;
    }

    public function username(?string $username): self
    {
        $this->config->put('username', $username);

        return $this;
    }

    public function password(?string $password): self
    {
        $this->config->put('password', $password);

        return $this;
    }

    public function timeout(int|string|null $timeout): self
    {
        $this->config->put('timeout', $timeout === null ? null : (int) $timeout);

        return $this;
    }

    public function localDomain(?string $localDomain): self
    {
        $this->config->put('local_domain', $localDomain);

        return $this;
    }
}
