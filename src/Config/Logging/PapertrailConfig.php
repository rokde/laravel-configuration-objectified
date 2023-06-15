<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Logging;

use Monolog\Handler\SyslogUdpHandler;
use Monolog\Processor\PsrLogMessageProcessor;

class PapertrailConfig extends MonologDriverConfig
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->level(env('LOG_LEVEL', 'debug'))
            ->handler(
                handler: env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class),
                with: [
                    'host' => env('PAPERTRAIL_URL'),
                    'port' => env('PAPERTRAIL_PORT'),
                    'connectionString' => 'tls://'.env('PAPERTRAIL_URL').':'.env('PAPERTRAIL_PORT'),
                ]
            )
            ->processor(PsrLogMessageProcessor::class);
    }
}
