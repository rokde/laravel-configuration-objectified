<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Hashing;

use Rokde\LaravelConfigurationObjectified\Config\Config;

class ArgonOptions extends Config
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->memory(65536)
            ->threads(1)
            ->time(4);
    }

    public function memory(int $memory): self
    {
        $this->config->put('memory', $memory);

        return $this;
    }

    public function threads(int $threads): self
    {
        $this->config->put('threads', $threads);

        return $this;
    }

    public function time(int $time): self
    {
        $this->config->put('time', $time);

        return $this;
    }
}
