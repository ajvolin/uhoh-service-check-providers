<?php

namespace UhOh\ServiceCheckProvider;

use UhOh\ServiceCheckProvider\ServiceCheckProviders;
use Illuminate\Support\ServiceProvider;

class ServiceCheckProviderServiceProvider extends ServiceProvider
{
    /**
     * Register the ServiceCheckProviders singleton
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ServiceCheckProviders::class, function($app) {
            return new ServiceCheckProviders;
        });
    }
}