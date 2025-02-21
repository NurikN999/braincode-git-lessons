<?php

namespace App\Providers;

use App\Contracts\PaymentInterface;
use App\Services\PaymentProcessors\KaspiBankProcessor;
use App\Services\PaymentProcessors\PayPalProcessor;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (env('BANK_PROCESS')) {
            $this->app->bind(PaymentInterface::class, KaspiBankProcessor::class);
        } else {
            $this->app->bind(PaymentInterface::class, PayPalProcessor::class);
        }
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
