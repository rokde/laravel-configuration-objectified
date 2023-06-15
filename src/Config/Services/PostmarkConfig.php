<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Services;

use Rokde\LaravelConfigurationObjectified\Config\Config;

class PostmarkConfig extends Config
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->token(token: env('POSTMARK_TOKEN'));
    }

    public function token(?string $token): self
    {
        $this->config->put('token', $token);

        return $this;
    }
}
