<?php

namespace Alathazal\StarforgedLaravel;

use Illuminate\Support\ServiceProvider;
use Alathazal\StarforgedLaravel\Starforged;

class StarforgedServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            Starforged::class,
            fn () => new Starforged()
        );
    }
}