<?php

namespace Workbench\App\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use ReflectionClass;
use VendorName\Skeleton\PluginServiceProvider;

class SpladeComponentMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:splade-component {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Splade component';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $componentPath = base_path('../../../../src/Components');
        $viewPath = base_path('../../../../resources/views/components');

        $name = $this->argument('name');

        file_put_contents(
            "{$componentPath}/".Str::studly($name).'.php',
            $this->compileComponentStub($name)
        );

        file_put_contents(
            "{$viewPath}/".Str::kebab(Str::studly($name)).'.blade.php',
            $this->compileViewStub($name)
        );
    }

    private function compileComponentStub(string $name): string
    {
        $serviceProvider = new PluginServiceProvider(app());

        $namespace = (new ReflectionClass($serviceProvider))->getNamespaceName();

        return str_replace(
            ['{{ namespace }}', '{{ className }}', '{{ pluginName }}', '{{ bladeName }}'],
            [
                $namespace,
                Str::studly($name),
                $serviceProvider->getPluginName(),
                Str::kebab(Str::studly($name)),
            ],
            file_get_contents(__DIR__.'/component.php.stub')
        );
    }

    private function compileViewStub(): string
    {
        return file_get_contents(__DIR__.'/view.blade.php.stub');
    }
}
