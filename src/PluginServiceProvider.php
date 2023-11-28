<?php

namespace VendorName\Skeleton;

use ProtoneMedia\SpladeCore\SpladePluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class PluginServiceProvider extends SpladePluginServiceProvider
{
    /**
     * The name of your composer package.
     */
    protected string $composerPackageName = ':vendor_slug/:package_slug';

    /**
     * The name of the plugin. This is just to resolve the views:
     *
     * <?php view(':package_slug::components.avatar'); ?>
     */
    protected string $pluginName = ':package_slug';

    /**
     * Return an array of components that should be registered.
     */
    public function getComponents(): array
    {
        return [
            Components\Example::class,
        ];
    }

    /**
     * Additional configuration for the package.
     */
    public function configureSpladePackage(Package $package): void
    {
        //
    }

    public function registeringPackage()
    {
        //
    }

    public function packageRegistered()
    {
        //
    }

    public function bootingPackage()
    {
        //
    }

    public function packageBooted()
    {
        //
    }
}
