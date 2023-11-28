<?php

namespace Workbench\App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use ProtoneMedia\SpladeCore\Facades\SpladePlugin;
use VendorName\Skeleton\PluginServiceProvider;
use Workbench\App\Console\SpladeComponentMakeCommand;

class WorkbenchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Vite::useHotFile(__DIR__.'/../../public/hot');

        config([
            'splade-core.compiled_scripts' => __DIR__.'/../../../resources/js/splade',
            'view.paths' => array_merge(config('view.paths'), [
                __DIR__.'/../../../resources/views',
            ]),
        ]);

        $this->commands([
            SpladeComponentMakeCommand::class,
        ]);

        SpladePlugin::putComponentsOnWorkbench(
            (new PluginServiceProvider($this->app))->getComponents()
        );
    }
}
