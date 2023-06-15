<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config;

class CorsConfig extends Config implements ConfigurationIdentifier
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->paths(['api/*', 'sanctum/csrf-cookie'])
            ->allowedMethods(['*'])
            ->allowedOrigins(['*'])
            ->allowedOriginPatterns([])
            ->allowedHeaders(['*'])
            ->exposedHeaders([])
            ->maxAge(0)
            ->supportsCredentials(false);
    }

    /**
     * Here you may configure your settings for cross-origin resource sharing
     * or "CORS". This determines what cross-origin operations may execute
     * in web browsers. You are free to adjust these settings as needed.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
     *
     * @param  array<string>  $paths
     * @return $this
     */
    public function paths(array $paths): self
    {
        $this->config->put('paths', $paths);

        return $this;
    }

    public function allowedMethods(array $methods): self
    {
        $this->config->put('allowed_methods', $methods);

        return $this;
    }

    public function allowedOrigins(array $origins): self
    {
        $this->config->put('allowed_origins', $origins);

        return $this;
    }

    public function allowedOriginPatterns(array $patterns): self
    {
        $this->config->put('allowed_origins_patterns', $patterns);

        return $this;
    }

    public function allowedHeaders(array $headers): self
    {
        $this->config->put('allowed_headers', $headers);

        return $this;
    }

    public function exposedHeaders(array $headers): self
    {
        $this->config->put('exposed_headers', $headers);

        return $this;
    }

    public function maxAge(int $maxAge): self
    {
        $this->config->put('max_age', $maxAge);

        return $this;
    }

    public function supportsCredentials(bool|string $supportsCredentials = true): self
    {
        $this->config->put('supports_credentials', (bool) $supportsCredentials);

        return $this;
    }

    public function identifier(): string
    {
        return 'cors';
    }
}
