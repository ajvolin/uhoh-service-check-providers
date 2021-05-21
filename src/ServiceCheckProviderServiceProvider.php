<?php

namespace UhOh\ServiceCheckProvider;

use Illuminate\Contracts\Support\DeferrableProvider;
use UhOh\ServiceCheckProvider\ServiceCheckProviders;
use Illuminate\Support\ServiceProvider;

class ServiceCheckProviderServiceProvider extends ServiceProvider implements DeferrableProvider
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

    /**
     * Get the services provided by the provider
     * 
     * @return array
     */
    public function provides()
    {
        return [ServiceCheckProviders::class];
    }
}