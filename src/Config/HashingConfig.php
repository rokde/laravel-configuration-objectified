<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config;

use Rokde\LaravelConfigurationObjectified\Config\Hashing\ArgonOptions;
use Rokde\LaravelConfigurationObjectified\Config\Hashing\BcryptOptions;

class HashingConfig extends Config implements ConfigurationIdentifier
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->driver(driver: 'bcrypt')
            ->bcryptOptions(options: BcryptOptions::makeDefault())
            ->argonOptions(options: ArgonOptions::makeDefault());
    }

    /**
     * This option controls the default hash driver that will be used to hash
     * passwords for your application. By default, the bcrypt algorithm is
     * used; however, you remain free to modify this option if you wish.
     *
     * Supported: "bcrypt", "argon", "argon2id"
     *
     * @return $this
     */
    public function driver(string $driver): self
    {
        $this->config->put('driver', $driver);

        return $this;
    }

    public function bcryptOptions(BcryptOptions $options): self
    {
        $this->config->put('bcrypt', $options);

        return $this;
    }

    public function argonOptions(ArgonOptions $options): self
    {
        $this->config->put('argon', $options);

        return $this;
    }

    public function identifier(): string
    {
        return 'hashing';
    }
}
