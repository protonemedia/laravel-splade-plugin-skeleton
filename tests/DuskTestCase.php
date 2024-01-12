<?php

namespace Tests;

use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\Dusk\TestCase as BaseTestCase;

abstract class DuskTestCase extends BaseTestCase
{
    use WithWorkbench;

    protected static $baseServePort = 8000;

    public function setUp(): void
    {
        $_ENV['LARAVEL_STORAGE_PATH'] = __DIR__.'/../vendor/orchestra/testbench-core/laravel/storage';

        parent::setUp();

        $db = base_path('../../testbench-core/laravel/database/database.sqlite');

        config([
            'database.default' => 'sqlite',
            'database.connections.sqlite.database' => $db,
        ]);
    }

    public static function startServing(): void
    {
        // We start the server manually, because we want to use the
        // same application in the tests as in development.
    }

    /**
     * Create a new Browser instance.
     *
     * @return \Tests\Browser
     */
    protected function newBrowser($driver)
    {
        return new Browser($driver);
    }
}
