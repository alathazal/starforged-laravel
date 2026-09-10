<?php

namespace Alathazal\DataforgedLaravel;

use Illuminate\Support\ServiceProvider;
use Alathazal\DataforgedPhp\Dataforged;

class DataforgedServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            Dataforged::class,
            fn () => new Dataforged()
        );
    }
}