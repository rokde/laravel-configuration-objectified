<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config;

use Rokde\LaravelConfigurationObjectified\Config\Services\MailgunConfig;
use Rokde\LaravelConfigurationObjectified\Config\Services\PostmarkConfig;
use Rokde\LaravelConfigurationObjectified\Config\Services\SesConfig;

class ServicesConfig extends Config implements ConfigurationIdentifier
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->mailgun(options: MailgunConfig::makeDefault())
            ->postmark(options: PostmarkConfig::makeDefault())
            ->ses(options: SesConfig::makeDefault());
    }

    public function mailgun(MailgunConfig $options): self
    {
        $this->config->put('mailgun', $options);

        return $this;
    }

    public function postmark(PostmarkConfig $options): self
    {
        $this->config->put('postmark', $options);

        return $this;
    }

    public function ses(SesConfig $options): self
    {
        $this->config->put('ses', $options);

        return $this;
    }

    public function service(string $service, Config $options): self
    {
        $this->config->put($service, $options);

        return $this;
    }

    public function identifier(): string
    {
        return 'services';
    }
}
