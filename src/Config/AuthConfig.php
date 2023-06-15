<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config;

use Rokde\LaravelConfigurationObjectified\Config\Auth\GuardConfig;
use Rokde\LaravelConfigurationObjectified\Config\Auth\PasswordConfig;
use Rokde\LaravelConfigurationObjectified\Config\Auth\ProviderConfig;

class AuthConfig extends Config implements ConfigurationIdentifier
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->defaults(
                guard: 'web',
                passwords: 'users',
            )
            ->guard(
                guard: 'web',
                config: GuardConfig::makeDefault(),
            )
            ->provider(
                provider: 'users',
                config: ProviderConfig::makeDefault(),
            )
            ->password(
                password: 'users',
                config: PasswordConfig::makeDefault(),
            )
            ->passwordConfirmationTimeout(passwordTimeoutInSeconds: 10800);
    }

    /**
     * This option controls the default authentication "guard" and password
     * reset options for your application. You may change these defaults
     * as required, but they're a perfect start for most applications.
     *
     * @return $this
     */
    public function defaults(string $guard, string $passwords): self
    {
        $this->config->put('defaults.guard', $guard);
        $this->config->put('defaults.passwords', $passwords);

        return $this;
    }

    /**
     * Next, you may define every authentication guard for your application.
     * Of course, a great default configuration has been defined for you
     * here which uses session storage and the Eloquent user provider.
     *
     * All authentication drivers have a user provider. This defines how the
     * users are actually retrieved out of your database or other storage
     * mechanisms used by this application to persist your user's data.
     *
     * Supported: "session"
     *
     * @return $this
     */
    public function guard(string $guard, GuardConfig $config): self
    {
        $this->config->put('guards.'.$guard, $config);

        return $this;
    }

    /**
     * All authentication drivers have a user provider. This defines how the
     * users are actually retrieved out of your database or other storage
     * mechanisms used by this application to persist your user's data.
     *
     * If you have multiple user tables or models you may configure multiple
     * sources which represent each model / table. These sources may then
     * be assigned to any extra authentication guards you have defined.
     *
     * Supported: "database", "eloquent"
     *
     * @return $this
     */
    public function provider(string $provider, ProviderConfig $config): self
    {
        $this->config->put('providers.'.$provider, $config);

        return $this;
    }

    /**
     * You may specify multiple password reset configurations if you have more
     * than one user table or model in the application and you want to have
     * separate password reset settings based on the specific user types.
     *
     * The expiry time is the number of minutes that each reset token will be
     * considered valid. This security feature keeps tokens short-lived so
     * they have less time to be guessed. You may change this as needed.
     *
     * The throttle setting is the number of seconds a user must wait before
     * generating more password reset tokens. This prevents the user from
     * quickly generating a very large amount of password reset tokens.
     *
     * @return $this
     */
    public function password(string $password, PasswordConfig $config): self
    {
        $this->config->put('passwords.'.$password, $config);

        return $this;
    }

    /**
     * Here you may define the amount of seconds before a password confirmation
     * times out and the user is prompted to re-enter their password via the
     * confirmation screen. By default, the timeout lasts for three hours.
     *
     * @return $this
     */
    public function passwordConfirmationTimeout(int $passwordTimeoutInSeconds): self
    {
        $this->config->put('password_timeout', $passwordTimeoutInSeconds);

        return $this;
    }

    public function identifier(): string
    {
        return 'auth';
    }
}
