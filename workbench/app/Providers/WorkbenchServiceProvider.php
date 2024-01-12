<?php

namespace Workbench\App\Providers;

use Illuminate\Support\ServiceProvider;

class WorkbenchServiceProvider extends ServiceProvider
{
    use SpladeCoreOnWorkbench;

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
        $this->configureSpladeCore();
        $this->configureEloquentFactories();
    }
}
