<?php

declare(strict_types=1);

namespace Rokde\LaravelConfigurationObjectified\Config;

use Rokde\LaravelConfigurationObjectified\Config\Filesystems\LocalDiskConfig;
use Rokde\LaravelConfigurationObjectified\Config\Filesystems\S3DiskConfig;

class FilesystemsConfig extends Config implements ConfigurationIdentifier
{
    public static function makeDefault(): static
    {
        return parent::makeDefault()
            ->defaultDisk(env('FILESYSTEM_DISK', 'local'))
            ->disk(disk: 'local', config: LocalDiskConfig::makeDefault())
            ->disk(
                disk: 'public',
                config: LocalDiskConfig::makeDefault()
                    ->root(storage_path('app/public'))
                    ->url(env('APP_URL').'/storage')
                    ->visibility('public')
            )
            ->disk(disk: 's3', config: S3DiskConfig::makeDefault())
            ->link(target: public_path('storage'), source: storage_path('app/public'));
    }

    /**
     * Here you may specify the default filesystem disk that should be used
     * by the framework. The "local" disk, as well as a variety of cloud
     * based disks are available to your application. Just store away!
     *
     * @return $this
     */
    public function defaultDisk(string $default): self
    {
        $this->config->put('default', $default);

        return $this;
    }

    /**
     * Here you may configure as many filesystem "disks" as you wish, and you
     * may even configure multiple disks of the same driver. Defaults have
     * been set up for each driver as an example of the required values.
     *
     * Supported Drivers: "local", "ftp", "sftp", "s3"
     *
     * @return $this
     */
    public function disk(string $disk, LocalDiskConfig|S3DiskConfig|Config $config): self
    {
        $this->config->put('disks.'.$disk, $config);

        return $this;
    }

    /**
     * Here you may configure the symbolic links that will be created when the
     * `storage:link` Artisan command is executed. The array keys should be
     * the locations of the links and the values should be their targets.
     *
     * @return $this
     */
    public function link(string $target, string $source): self
    {
        $links = $this->config->get('links');
        $links[$target] = $source;

        $this->config->put('links', $links);

        return $this;
    }

    public function identifier(): string
    {
        return 'filesystems';
    }
}
