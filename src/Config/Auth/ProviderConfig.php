<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config\Auth;

use Rokde\LaravelConfigurationObjectified\Config\Concerns\HasDriver;
use Rokde\LaravelConfigurationObjectified\Config\Config;

class ProviderConfig extends Config
{
    use HasDriver;

    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->model(\App\Models\User::class);
    }

    public function model(string $model): self
    {
        $this->driver('eloquent');
        $this->config->put('model', $model);

        return $this;
    }

    public function table(string $table): self
    {
        $this->driver('database');
        $this->config->put('table', $table);

        return $this;
    }
}
