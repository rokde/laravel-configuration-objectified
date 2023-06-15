<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Logging;

use Monolog\Handler\StreamHandler;
use Monolog\Processor\PsrLogMessageProcessor;

class StderrConfig extends MonologDriverConfig
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->level(env('LOG_LEVEL', 'debug'))
            ->handler(handler: StreamHandler::class)
            ->formatter(
                formatter: env('LOG_STDERR_FORMATTER'),
                with: [
                    'stream' => 'php://stderr',
                ]
            )
            ->processor(PsrLogMessageProcessor::class);
    }
}
