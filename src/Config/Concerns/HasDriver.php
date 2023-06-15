<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Concerns;

/**
 * @property-read \Illuminate\Support\Collection $config
 */
trait HasDriver
{
    public function driver(string $driver): self
    {
        $this->config->put('driver', $driver);

        return $this;
    }
}
