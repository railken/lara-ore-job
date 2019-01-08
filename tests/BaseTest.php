<?php

namespace Railken\Amethyst\Tests;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;

abstract class BaseTest extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        $dotenv = new \Dotenv\Dotenv(__DIR__.'/..', '.env');
        $dotenv->load();

        parent::setUp();

        File::cleanDirectory(database_path('migrations/'));

        $this->artisan('vendor:publish', [
            '--provider' => 'Spatie\MediaLibrary\MediaLibraryServiceProvider',
        ]);
        $this->artisan('migrate:fresh');
        $this->artisan('amethyst:user:install');
        Config::set('amethyst.notification.data.notification.user', \Railken\Amethyst\Models\User::class);
    }

    protected function getPackageProviders($app)
    {
        return [
            \Railken\Amethyst\Providers\WorkServiceProvider::class,
            \Railken\Amethyst\Providers\UserServiceProvider::class,
        ];
    }
}
