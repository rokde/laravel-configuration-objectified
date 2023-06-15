<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppConfig extends Config implements ConfigurationIdentifier
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->name(name: env('APP_NAME', 'Laravel'))
            ->environment(environment: env('APP_ENV', 'production'))
            ->debugMode(debugMode: (bool) env('APP_DEBUG', false))
            ->url(url: env('APP_URL', 'http://localhost'))
            ->assetUrl(assetUrl: env('ASSET_URL'))
            ->timezone(timezone: 'UTC')
            ->locale('en')
            ->fallbackLocale('en')
            ->fakerLocale('en_US')
            ->key(key: env('APP_KEY'))
            ->cipher(cipher: 'AES-256-CBC')
            ->maintenance(driver: 'file')
            ->providers(
                ServiceProvider::defaultProviders()->merge([
                    /*
                     * Package Service Providers...
                     */

                    /*
                     * Application Service Providers...
                     */
                    \App\Providers\AppServiceProvider::class,
                    \App\Providers\AuthServiceProvider::class,
                    // \App\Providers\BroadcastServiceProvider::class,
                    \App\Providers\EventServiceProvider::class,
                    \App\Providers\RouteServiceProvider::class,
                ])->toArray()
            )
            ->aliases(
                Facade::defaultAliases()->merge([
                    // 'Example' => App\Facades\Example::class,
                ])->toArray()
            );
    }

    /**
     * This value is the name of your application. This value is used when the
     * framework needs to place the application's name in a notification or
     * any other location as required by the application or its packages.
     *
     * @return $this
     */
    public function name(string $name): self
    {
        $this->config->put('name', $name);

        return $this;
    }

    /**
     * This value determines the "environment" your application is currently
     * running in. This may determine how you prefer to configure various
     * services the application utilizes. Set this in your ".env" file.
     *
     * @return $this
     */
    public function environment(string $environment): self
    {
        $this->config->put('env', $environment);

        return $this;
    }

    /**
     * When your application is in debug mode, detailed error messages with
     * stack traces will be shown on every error that occurs within your
     * application. If disabled, a simple generic error page is shown.
     *
     * @return $this
     */
    public function debugMode(bool|string $debugMode = true): self
    {
        $this->config->put('debug', (bool) $debugMode);

        return $this;
    }

    /**
     * This URL is used by the console to properly generate URLs when using
     * the Artisan command line tool. You should set this to the root of
     * your application so that it is used when running Artisan tasks.
     *
     * @return $this
     */
    public function url(string $url): self
    {
        $this->config->put('url', Str::of($url)->trim()->lower()->value());

        return $this;
    }

    public function assetUrl(?string $assetUrl): self
    {
        $this->config->put('asset_url', $assetUrl === null
            ? null
            : Str::of($assetUrl)->trim()->lower()->value()
        );

        return $this;
    }

    /**
     * Here you may specify the default timezone for your application, which
     * will be used by the PHP date and date-time functions. We have gone
     * ahead and set this to a sensible default for you out of the box.
     *
     * @return $this
     */
    public function timezone(string $timezone): self
    {
        $this->config->put('timezone', $timezone);

        return $this;
    }

    /**
     * The application locale determines the default locale that will be used
     * by the translation service provider. You are free to set this value
     * to any of the locales which will be supported by the application.
     *
     * @return $this
     */
    public function locale(string $locale): self
    {
        $this->config->put('locale', $locale);

        return $this;
    }

    /**
     * The fallback locale determines the locale to use when the current one
     * is not available. You may change the value to correspond to any of
     * the language folders that are provided through your application.
     *
     * @return $this
     */
    public function fallbackLocale(string $locale): self
    {
        $this->config->put('fallback_locale', $locale);

        return $this;
    }

    /**
     * This locale will be used by the Faker PHP library when generating fake
     * data for your database seeds. For example, this will be used to get
     * localized telephone numbers, street address information and more.
     *
     * @return $this
     */
    public function fakerLocale(string $locale): self
    {
        $this->config->put('faker_locale', $locale);

        return $this;
    }

    /**
     * This key is used by the Illuminate encrypter service and should be set
     * to a random, 32 character string, otherwise these encrypted strings
     * will not be safe. Please do this before deploying an application!
     *
     * @param  string  $key
     * @return $this
     */
    public function key(?string $key): self
    {
        $this->config->put('key', (string) $key);

        return $this;
    }

    public function cipher(string $cipher): self
    {
        $this->config->put('cipher', $cipher);

        return $this;
    }

    /**
     * These configuration options determine the driver used to determine and
     * manage Laravel's "maintenance mode" status. The "cache" driver will
     * allow maintenance mode to be controlled across multiple machines.
     *
     * Supported drivers: "file", "cache"
     *
     * @return $this
     */
    public function maintenance(string $driver, ?string $store = null): self
    {
        $this->config->put('maintenance', $driver);
        if ($driver === 'cache') {
            $this->config->put('store', $store ?? 'redis');
        }

        return $this;
    }

    /**
     * The service providers listed here will be automatically loaded on the
     * request to your application. Feel free to add your own services to
     * this array to grant expanded functionality to your applications.
     *
     * @param  array<class-string>  $providers
     * @return $this
     */
    public function providers(array $providers): self
    {
        $this->config->put('providers', $providers);

        return $this;
    }

    /**
     * This array of class aliases will be registered when this application
     * is started. However, feel free to register as many as you wish as
     * the aliases are "lazy" loaded so they don't hinder performance.
     *
     * @param  array<string, class-string>  $aliases
     * @return $this
     */
    public function aliases(array $aliases): self
    {
        $this->config->put('aliases', $aliases);

        return $this;
    }

    public function identifier(): string
    {
        return 'app';
    }
}
