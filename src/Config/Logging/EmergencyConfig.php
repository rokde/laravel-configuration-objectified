<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Logging;

use Rokde\LaravelConfigurationObjectified\Config\Config;

class EmergencyConfig extends Config
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->path(storage_path('logs/laravel.log'));
    }

    public function path(string $path): self
    {
        $this->config->put('path', $path);

        return $this;
    }
}
