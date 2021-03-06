<?php

namespace Amethyst\Tests;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

abstract class BaseTest extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     */
    public function setUp(): void
    {
        parent::setUp();

        File::cleanDirectory(database_path('migrations/'));

        $this->artisan('vendor:publish', [
            '--provider' => 'Spatie\MediaLibrary\MediaLibraryServiceProvider',
        ]);
        $this->artisan('migrate:fresh');
        $this->artisan('amethyst:user:install');
        Config::set('amethyst.notification.data.notification.user', \Amethyst\Models\User::class);
    }

    protected function getPackageProviders($app)
    {
        return [
            \Amethyst\Providers\WorkServiceProvider::class,
            \Amethyst\Providers\UserServiceProvider::class,
        ];
    }
}
