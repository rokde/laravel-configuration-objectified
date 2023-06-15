<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config;

class ViewConfig extends Config implements ConfigurationIdentifier
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->paths(paths: [resource_path('views')])
            ->compiled(compiled: env(
                'VIEW_COMPILED_PATH',
                realpath(storage_path('framework/views'))
            ));
    }

    /**
     * Most templating systems load templates from disk. Here you may specify
     * an array of paths that should be checked for your views. Of course
     * the usual Laravel view path has already been registered for you.
     *
     * @param  array<string>  $paths
     * @return $this
     */
    public function paths(array $paths): self
    {
        $this->config->put('paths', $paths);

        return $this;
    }

    /**
     * This option determines where all the compiled Blade templates will be
     * stored for your application. Typically, this is within the storage
     * directory. However, as usual, you are free to change this value.
     *
     * @return $this
     */
    public function compiled(string $compiled): self
    {
        $this->config->put('compiled', $compiled);

        return $this;
    }

    public function identifier(): string
    {
        return 'view';
    }
}
