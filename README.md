# Laravel Splade Core - Plugin Skeleton

## How to use the skeleton

This skeleton is based on Spatie's [Laravel package skeleton](<https://github.com/spatie/package-skeleton-laravel>). It's a great starting point for any Laravel package, so be sure to check it out. This skeleton adds some extra features to make it easier to get started with [Splade Core](<https://github.com/protonemedia/laravel-splade-core>).

### Installation

First, clone this repository and run the `configure.php` script:

```bash
php configure.php
```

This will ask you a few questions and then configure the skeleton for you.

### Develop environment

The skeleton comes with a [Workbench](https://github.com/orchestral/workbench) setup. This allows you to build components in a full-blown Laravel application. The configuration script already installed the workbench for you, but you can also install it manually:

```bash
composer install
npm install
cd workbench && npm install
```

Then, in the root of the project, run `composer dev` to start the Vite development server. This will watch your files and automatically recompile them when you make changes. In another terminal, run `composer serve` to start the Laravel HTTP server. This will serve the workbench application on `http://localhost:8000`.

The default page is a simple Splade component. The workbench view can be found in `workbench/resources/views/demo.blade.php`. The component itself is in `src/Components/Example.php` and the Blade view in `resources/views/components/example.blade.php`.

### Making Components

You may create a new Splade component using the `make:splade-component` command:

```bash
./vendor/bin/testbench make:splade-component Avatar
```

Make sure to add the Component to the array in `src/PluginServiceProvider.php`:

```php
public function getComponents(): array
{
    return [
        Components\Avatar::class,
        Components\Example::class,
    ];
}
```

### Prepare for production

When you're ready to publish your package, run `composer build`. This will build your assets for production and copy the necessary files to the `dist` directory. You can then publish your package to Packagist.