<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config;

interface ConfigurationIdentifier
{
    /**
     * Identifier for the configuration
     */
    public function identifier(): string;
}
