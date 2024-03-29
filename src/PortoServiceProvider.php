<?php

namespace AdminKit\Porto;

use AdminKit\Porto\Commands\PortoCommand;
use AdminKit\Porto\Loaders\AutoLoaderTrait;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PortoServiceProvider extends PackageServiceProvider
{
    use AutoLoaderTrait;

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('porto')
            ->hasConfigFile()
            ->hasCommand(PortoCommand::class);
    }

    public function bootingPackage()
    {
        $this
            ->initPorto(portoPath: app_path())
            ->runLoaderBoot();
    }

    public function registeringPackage()
    {
        $this
            ->initPorto(portoPath: app_path())
            ->runLoaderRegister();
    }
}
