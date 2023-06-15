<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config;

use Rokde\LaravelConfigurationObjectified\Config\Mail\ArrayTransportDriverConfig;
use Rokde\LaravelConfigurationObjectified\Config\Mail\FailoverTransportDriverConfig;
use Rokde\LaravelConfigurationObjectified\Config\Mail\LogTransportDriverConfig;
use Rokde\LaravelConfigurationObjectified\Config\Mail\MailgunTransportDriverConfig;
use Rokde\LaravelConfigurationObjectified\Config\Mail\PostmarkTransportDriverConfig;
use Rokde\LaravelConfigurationObjectified\Config\Mail\SendmailTransportDriverConfig;
use Rokde\LaravelConfigurationObjectified\Config\Mail\SesTransportDriverConfig;
use Rokde\LaravelConfigurationObjectified\Config\Mail\SmtpTransportDriverConfig;

class MailConfig extends Config implements ConfigurationIdentifier
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->defaultMailer(env('MAIL_MAILER', 'smtp'))
            ->mailer('smtp', SmtpTransportDriverConfig::makeDefault())
            ->mailer('ses', SesTransportDriverConfig::makeDefault())
            ->mailer('mailgun', MailgunTransportDriverConfig::makeDefault())
            ->mailer('postmark', PostmarkTransportDriverConfig::makeDefault())
            ->mailer('sendmail', SendmailTransportDriverConfig::makeDefault())
            ->mailer('log', LogTransportDriverConfig::makeDefault())
            ->mailer('array', ArrayTransportDriverConfig::makeDefault())
            ->mailer('failover', FailoverTransportDriverConfig::makeDefault())
            ->from(
                email: env('MAIL_FROM_ADDRESS', 'hello@example.com'),
                name: env('MAIL_FROM_NAME', 'Example'),
            )
            ->markdown(
                theme: 'default',
                paths: [
                    resource_path('views/vendor/mail'),
                ],
            );
    }

    /**
     * This option controls the default mailer that is used to send any email
     * messages sent by your application. Alternative mailers may be setup
     * and used as needed; however, this mailer will be used by default.
     *
     * @return $this
     */
    public function defaultMailer(string $default): self
    {
        $this->config->put('default', $default);

        return $this;
    }

    /**
     * Here you may configure all of the mailers used by your application plus
     * their respective settings. Several examples have been configured for
     * you and you are free to add your own as your application requires.
     *
     * Laravel supports a variety of mail "transport" drivers to be used while
     * sending an e-mail. You will specify which one you are using for your
     * mailers below. You are free to add additional mailers as required.
     *
     * Supported: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
     *            "postmark", "log", "array", "failover"
     *
     * @return $this
     */
    public function mailer(string $mailer, Config $config): self
    {
        $this->config->put('mailers.'.$mailer, $config);

        return $this;
    }

    /**
     * You may wish for all e-mails sent by your application to be sent from
     * the same address. Here, you may specify a name and address that is
     * used globally for all e-mails that are sent by your application.
     *
     * @return $this
     */
    public function from(string $email, string $name): self
    {
        $this->config->put('from', [
            'address' => $email,
            'name' => $name,
        ]);

        return $this;
    }

    /**
     * If you are using Markdown based email rendering, you may configure your
     * theme and component paths here, allowing you to customize the design
     * of the emails. Or, you may simply stick with the Laravel defaults!
     *
     * @return $this
     */
    public function markdown(string $theme, array $paths = []): self
    {
        $this->config->put('markdown', [
            'theme' => $theme,
            'paths' => $paths,
        ]);

        return $this;
    }

    public function identifier(): string
    {
        return 'mail';
    }
}
