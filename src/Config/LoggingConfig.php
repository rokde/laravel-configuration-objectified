<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config;

use Rokde\LaravelConfigurationObjectified\Config\Logging\DailyDriverConfig;
use Rokde\LaravelConfigurationObjectified\Config\Logging\EmergencyConfig;
use Rokde\LaravelConfigurationObjectified\Config\Logging\ErrorlogDriverConfig;
use Rokde\LaravelConfigurationObjectified\Config\Logging\NullConfig;
use Rokde\LaravelConfigurationObjectified\Config\Logging\PapertrailConfig;
use Rokde\LaravelConfigurationObjectified\Config\Logging\SingleDriverConfig;
use Rokde\LaravelConfigurationObjectified\Config\Logging\SlackDriverConfig;
use Rokde\LaravelConfigurationObjectified\Config\Logging\StackDriverConfig;
use Rokde\LaravelConfigurationObjectified\Config\Logging\StderrConfig;
use Rokde\LaravelConfigurationObjectified\Config\Logging\SyslogDriverConfig;

class LoggingConfig extends Config implements ConfigurationIdentifier
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->defaultChannel(env('LOG_CHANNEL', 'stack'))
            ->deprecations(
                channel: env('LOG_DEPRECATIONS_CHANNEL', 'null'),
                trace: false,
            )
            ->channel(channel: 'stack', config: StackDriverConfig::makeDefault())
            ->channel(channel: 'single', config: SingleDriverConfig::makeDefault())
            ->channel(channel: 'daily', config: DailyDriverConfig::makeDefault())
            ->channel(channel: 'slack', config: SlackDriverConfig::makeDefault())
            ->channel(channel: 'papertrail', config: PapertrailConfig::makeDefault())
            ->channel(channel: 'stderr', config: StderrConfig::makeDefault())
            ->channel(channel: 'syslog', config: SyslogDriverConfig::makeDefault())
            ->channel(channel: 'errorlog', config: ErrorlogDriverConfig::makeDefault())
            ->channel(channel: 'null', config: NullConfig::makeDefault())
            ->channel(channel: 'emergency', config: EmergencyConfig::makeDefault());
    }

    /**
     * This option defines the default log channel that gets used when writing
     * messages to the logs. The name specified in this option should match
     * one of the channels defined in the "channels" configuration array.
     *
     * @return $this
     */
    public function defaultChannel(string $default): self
    {
        $this->config->put('default', $default);

        return $this;
    }

    /**
     * This option controls the log channel that should be used to log warnings
     * regarding deprecated PHP and library features. This allows you to get
     * your application ready for upcoming major versions of dependencies.
     *
     * @return $this
     */
    public function deprecations(?string $channel, bool|string $trace = true): self
    {
        $this->config->put('deprecations', [
            'channel' => $channel === null ? 'null' : $channel,
            'trace' => (bool) $trace,
        ]);

        return $this;
    }

    /**
     * Here you may configure the log channels for your application. Out of
     * the box, Laravel uses the Monolog PHP logging library. This gives
     * you a variety of powerful log handlers / formatters to utilize.
     *
     * Available Drivers: "single", "daily", "slack", "syslog",
     *                    "errorlog", "monolog",
     *                    "custom", "stack"
     *
     * @return $this
     */
    public function channel(string $channel, Config $config): self
    {
        $this->config->put('channels.'.$channel, $config);

        return $this;
    }

    public function identifier(): string
    {
        return 'logging';
    }
}
