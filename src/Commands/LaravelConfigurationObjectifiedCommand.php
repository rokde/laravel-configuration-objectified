<?php

namespace Rokde\LaravelConfigurationObjectified\Commands;

use Illuminate\Console\Command;

class LaravelConfigurationObjectifiedCommand extends Command
{
    public $signature = 'laravel-configuration-objectified';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
