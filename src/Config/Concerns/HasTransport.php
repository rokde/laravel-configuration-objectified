<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Concerns;

/**
 * @property-read \Illuminate\Support\Collection $config
 */
trait HasTransport
{
    public function transport(string $transport): self
    {
        $this->config->put('transport', $transport);

        return $this;
    }
}
