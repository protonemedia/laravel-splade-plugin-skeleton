<?php

namespace Workbench\App\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Vite;
use ProtoneMedia\SpladeCore\Facades\SpladePlugin;
use VendorName\Skeleton\PluginServiceProvider;
use Workbench\App\Console\SpladeComponentMakeCommand;

trait SpladeCoreOnWorkbench
{
    private function configureSpladeCore(): void
    {
        Vite::useHotFile(__DIR__.'/../../public/hot');

        config([
            'app.url' => 'http://127.0.0.1:8000',
            'splade-core.compiled_scripts' => __DIR__.'/../../../resources/js/splade',
            'view.paths' => array_merge(config('view.paths'), [
                __DIR__.'/../../../resources/views',
            ]),
        ]);

        SpladePlugin::putComponentsOnWorkbench(
            (new PluginServiceProvider($this->app))->getComponents()
        );

        $this->commands([
            SpladeComponentMakeCommand::class,
        ]);
    }

    private function configureEloquentFactories(): void
    {
        Factory::guessModelNamesUsing(function (Factory $factory) {
            $factoryBasename = class_basename($factory);
            $modelBasename = substr($factoryBasename, 0, -7);

            return 'Workbench\\App\\Models\\'.$modelBasename;
        });

        Factory::guessFactoryNamesUsing(function (string $modelName) {
            $modelBasename = class_basename($modelName);

            return 'Workbench\\Database\\Factories\\'.$modelBasename.'Factory';
        });
    }
}
