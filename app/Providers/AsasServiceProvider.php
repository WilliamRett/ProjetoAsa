<?php

namespace App\Providers;

use App\Services\Asas\AsasService;
use App\Services\Asas\Contract\AsasServiceContract;
use Illuminate\Support\ServiceProvider;

class AsasServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            AsasServiceContract::class,
            AsasService::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): array
    {
        return [AssasServiceContract::class];
    }
}
