<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Logging;

use Monolog\Handler\NullHandler;

class NullConfig extends MonologDriverConfig
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->handler(handler: NullHandler::class);
    }
}
