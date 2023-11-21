<?php

namespace App\Providers;

use App\Repositories\Payment\Contract\PaymentRepositoryContract;
use App\Repositories\Payment\PaymentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind(PaymentRepositoryContract::class, PaymentRepository::class);
        app()->bind(CostumerRepositoryContract::class, CostumerRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
