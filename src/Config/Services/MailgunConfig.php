<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Services;

use Rokde\LaravelConfigurationObjectified\Config\Config;

class MailgunConfig extends Config
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->domain(domain: env('MAILGUN_DOMAIN'))
            ->secret(secret: env('MAILGUN_SECRET'))
            ->endpoint(endpoint: env('MAILGUN_ENDPOINT', 'api.mailgun.net'))
            ->scheme(scheme: 'https');
    }

    public function domain(?string $domain): self
    {
        $this->config->put('domain', $domain);

        return $this;
    }

    public function secret(?string $secret): self
    {
        $this->config->put('secret', $secret);

        return $this;
    }

    public function endpoint(string $endpoint): self
    {
        $this->config->put('endpoint', $endpoint);

        return $this;
    }

    public function scheme(string $scheme): self
    {
        $this->config->put('scheme', $scheme);

        return $this;
    }
}
