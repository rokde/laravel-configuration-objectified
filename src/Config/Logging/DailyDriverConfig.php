<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Logging;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;

class DailyDriverConfig extends SingleDriverConfig
{
    use HasDriver;

    public static function make(): static
    {
        return (new static())
            ->driver('daily');
    }

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->days(14);
    }

    public function days(int|string $days): self
    {
        $this->config->put('days', (int) $days);

        return $this;
    }
}
