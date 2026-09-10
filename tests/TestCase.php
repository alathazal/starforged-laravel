<?php

namespace Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Alathazal\DataforgedLaravel\DataforgedServiceProvider;
use Spatie\LaravelData\LaravelDataServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function defineEnvironment($app): void
    {
        $app['config']->set('data', require __DIR__ .
            '/../vendor/spatie/laravel-data/config/data.php');
    }

    protected function getPackageProviders($app): array
    {
        return [
            LaravelDataServiceProvider::class,
            DataforgedServiceProvider::class,
        ];
    }
}