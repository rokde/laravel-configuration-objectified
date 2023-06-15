<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config;

class SanctumConfig extends Config implements ConfigurationIdentifier
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->stateful(
                explode(',', env('SANCTUM_STATEFUL_DOMAINS', sprintf(
                    '%s%s',
                    'localhost,localhost:3000,127.0.0.1,127.0.0.1:8000,::1',
                    \Laravel\Sanctum\Sanctum::currentApplicationUrlWithPort()
                )))
            )
            ->guard('web')
            ->expiration(null)
            ->middleware('verify_csrf_token', \App\Http\Middleware\VerifyCsrfToken::class)
            ->middleware('encrypt_cookies', \App\Http\Middleware\EncryptCookies::class);
    }

    /**
     * Requests from the following domains / hosts will receive stateful API
     * authentication cookies. Typically, these should include your local
     * and production domains which access your API via a frontend SPA.
     *
     * @return $this
     */
    public function stateful(array $stateful): self
    {
        $this->config->put('stateful', $stateful);

        return $this;
    }

    /**
     * This array contains the authentication guards that will be checked when
     * Sanctum is trying to authenticate a request. If none of these guards
     * are able to authenticate the request, Sanctum will use the bearer
     * token that's present on an incoming request for authentication.
     *
     * @return $this
     */
    public function guard(string $guard): self
    {
        $guards = $this->config->get('guards', []);
        $guards[] = $guard;

        $this->config->put('guards', $guards);

        return $this;
    }

    /**
     * This value controls the number of minutes until an issued token will be
     * considered expired. If this value is null, personal access tokens do
     * not expire. This won't tweak the lifetime of first-party sessions.
     *
     * @return $this
     */
    public function expiration(int|string|null $expirationInMinutes): self
    {
        $this->config->put('expiration', $expirationInMinutes === null ? null : (int) $expirationInMinutes);

        return $this;
    }

    /**
     * When authenticating your first-party SPA with Sanctum you may need to
     * customize some of the middleware Sanctum uses while processing the
     * request. You may change the middleware listed below as required.
     *
     * @return $this
     */
    public function middleware(string $middleware, string $className): self
    {
        $middlewares = $this->config->get('middleware', []);
        $middlewares[$middleware] = $className;

        $this->config->put('middleware', $middlewares);

        return $this;
    }

    public function identifier(): string
    {
        return 'sanctum';
    }
}
