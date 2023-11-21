<?php

namespace App\Providers;

use App\Repositories\Payment\PaymentRepository;
use App\Repositories\Payment\Contract\PaymentRepositoryContract;
use App\Repositories\Customer\CustomerRepository;
use App\Repositories\Customer\Contract\CustomerRepositoryContract;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            PaymentRepositoryContract::class,
            PaymentRepository::class
        );
        $this->app->bind(
            CustomerRepositoryContract::class,
            CustomerRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
