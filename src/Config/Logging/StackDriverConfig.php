<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Logging;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class StackDriverConfig extends Config
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('stack');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->channels(['single'])
            ->ignoreExceptions(false);
    }

    /**
     * @param  array<string>  $channels
     * @return $this
     */
    public function channels(array $channels): self
    {
        $this->config->put('channels', $channels);

        return $this;
    }

    public function ignoreExceptions(bool|string $ignoreExceptions = true): self
    {
        $this->config->put('ignore_exceptions', (bool) $ignoreExceptions);

        return $this;
    }
}
