<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Hashing;

use Rokde\LaravelConfigurationObjectified\Config\Config;

class BcryptOptions extends Config
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->rounds(env('BCRYPT_ROUNDS', 10));
    }

    public function rounds(int $rounds): self
    {
        $this->config->put('rounds', $rounds);

        return $this;
    }
}
