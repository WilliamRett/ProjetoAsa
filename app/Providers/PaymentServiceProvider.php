<?php

namespace App\Providers;

use App\Services\Payment\PaymentService;
use App\Services\Payment\Contract\PaymentServiceContract;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            PaymentServiceContract::class,
            PaymentService::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): array
    {
        return [PaymentServiceContract::class];
    }
}
