<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config;

use Illuminate\Support\Str;
use Rokde\LaravelConfigurationObjectified\Config\Session\SameSite;
use Rokde\LaravelConfigurationObjectified\Config\Session\SessionDriver;

class SessionConfig extends Config implements ConfigurationIdentifier
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->driver(driver: env('SESSION_DRIVER', 'file'))
            ->lifetime(lifetimeInMinutes: env('SESSION_LIFETIME', 120))
            ->expireOnClose(expireOnClose: false)
            ->encrypt(encrypt: false)
            ->files(path: storage_path('framework/sessions'))
            ->connection(connection: env('SESSION_CONNECTION'))
            ->table(table: 'sessions')
            ->store(store: env('SESSION_STORE'))
            ->lottery(odds: 2, outOf: 100)
            ->cookie(cookie: env(
                'SESSION_COOKIE',
                Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
            ))
            ->path(path: '/')
            ->domain(domain: env('SESSION_DOMAIN'))
            ->secure(secure: env('SESSION_SECURE_COOKIE'))
            ->httpOnly()
            ->sameSite(SameSite::LAX);
    }

    /**
     * This option controls the default session "driver" that will be used on
     * requests. By default, we will use the lightweight native driver but
     * you may specify any of the other wonderful drivers provided here.
     *
     * Supported: "file", "cookie", "database", "apc",
     *            "memcached", "redis", "dynamodb", "array"
     *
     * @return $this
     */
    public function driver(SessionDriver|string $driver): self
    {
        if (is_string($driver)) {
            if (! in_array($driver, collect(SessionDriver::cases())->pluck('value')->all())) {
                throw new \InvalidArgumentException("Session driver ${driver} is not supported");
            }
            $this->config->put('driver', $driver);

            return $this;
        }

        $this->config->put('driver', $driver->value);

        return $this;
    }

    /**
     * Here you may specify the number of minutes that you wish the session
     * to be allowed to remain idle before it expires. If you want them
     * to immediately expire on the browser closing, set that option.
     *
     * @return $this
     */
    public function lifetime(int $lifetimeInMinutes): self
    {
        $this->config->put('lifetime', $lifetimeInMinutes);

        return $this;
    }

    public function expireOnClose(bool|string $expireOnClose = true): self
    {
        $this->config->put('expire_on_close', (bool) $expireOnClose);

        return $this;
    }

    /**
     * This option allows you to easily specify that all of your session data
     * should be encrypted before it is stored. All encryption will be run
     * automatically by Laravel and you can use the Session like normal.
     *
     * @return $this
     */
    public function encrypt(bool|string $encrypt = true): self
    {
        $this->config->put('encrypt', (bool) $encrypt);

        return $this;
    }

    /**
     * When using the native session driver, we need a location where session
     * files may be stored. A default has been set for you but a different
     * location may be specified. This is only needed for file sessions.
     *
     * @return $this
     */
    public function files(string $path): self
    {
        $this->config->put('files', $path);

        return $this;
    }

    /**
     * When using the "database" or "redis" session drivers, you may specify a
     * connection that should be used to manage these sessions. This should
     * correspond to a connection in your database configuration options.
     *
     * @return $this
     */
    public function connection(?string $connection): self
    {
        $this->config->put('connection', $connection);

        return $this;
    }

    /**
     * When using the "database" session driver, you may specify the table we
     * should use to manage the sessions. Of course, a sensible default is
     * provided for you; however, you are free to change this as needed.
     *
     * @return $this
     */
    public function table(string $table): self
    {
        $this->config->put('table', $table);

        return $this;
    }

    /**
     * While using one of the framework's cache driven session backends you may
     * list a cache store that should be used for these sessions. This value
     * must match with one of the application's configured cache "stores".
     *
     * Affects: "apc", "dynamodb", "memcached", "redis"
     *
     * @return $this
     */
    public function store(?string $store): self
    {
        $this->config->put('store', $store);

        return $this;
    }

    /**
     * Some session drivers must manually sweep their storage location to get
     * rid of old sessions from storage. Here are the chances that it will
     * happen on a given request. By default, the odds are 2 out of 100.
     *
     * @return $this
     */
    public function lottery(int $odds, int $outOf = 100): self
    {
        $this->config->put('lottery', [$odds, $outOf]);

        return $this;
    }

    /**
     * Here you may change the name of the cookie used to identify a session
     * instance by ID. The name specified here will get used every time a
     * new session cookie is created by the framework for every driver.
     *
     * @return $this
     */
    public function cookie(string $cookie): self
    {
        $this->config->put('cookie', $cookie);

        return $this;
    }

    /**
     * The session cookie path determines the path for which the cookie will
     * be regarded as available. Typically, this will be the root path of
     * your application but you are free to change this when necessary.
     *
     * @return $this
     */
    public function path(string $path): self
    {
        $this->config->put('path', $path);

        return $this;
    }

    /**
     * Here you may change the domain of the cookie used to identify a session
     * in your application. This will determine which domains the cookie is
     * available to in your application. A sensible default has been set.
     *
     * @return $this
     */
    public function domain(?string $domain): self
    {
        $this->config->put('domain', $domain);

        return $this;
    }

    /**
     * By setting this option to true, session cookies will only be sent back
     * to the server if the browser has a HTTPS connection. This will keep
     * the cookie from being sent to you when it can't be done securely.
     *
     * @return $this
     */
    public function secure(bool|string|null $secure = true): self
    {
        $this->config->put('secure', (bool) $secure);

        return $this;
    }

    /**
     * Setting this value to true will prevent JavaScript from accessing the
     * value of the cookie and the cookie will only be accessible through
     * the HTTP protocol. You are free to modify this option if needed.
     *
     * @return $this
     */
    public function httpOnly(bool|string|null $httpOnly = true): self
    {
        $this->config->put('http_only', (bool) $httpOnly);

        return $this;
    }

    /**
     * This option determines how your cookies behave when cross-site requests
     * take place, and can be used to mitigate CSRF attacks. By default, we
     * will set this value to "lax" since this is a secure default value.
     *
     * Supported: "lax", "strict", "none", null
     *
     * @return $this
     */
    public function sameSite(SameSite|string|null $sameSite): self
    {
        if ($sameSite === null) {
            return $this;
        }

        if (is_string($sameSite)) {
            if (! in_array($sameSite, collect(SameSite::cases())->pluck('value')->all())) {
                throw new \InvalidArgumentException("Same site value ${sameSite} is not supported");
            }
            $this->config->put('same_site', $sameSite);

            return $this;
        }

        $this->config->put('same_site', $sameSite->value);

        return $this;
    }

    public function identifier(): string
    {
        return 'session';
    }
}
