<?php

namespace UhOh\ServiceCheckProvider\Facades;

use Illuminate\Support\Facades\Facade;
use UhOh\ServiceCheckProvider\ServiceCheckProviders as SCP;

/**
 * Class ServiceCheckProviders
 * 
 * @package UhOh/ServiceCheckProviders
 * 
 * @method static void registerServiceCheckProvider(\UhOh\ServiceCheckProvider\ServiceCheckProvider $serviceCheckProvider)
 * @method static \UhOh\ServiceCheckProvider\ServiceCheckProvider getServiceCheckProvider(string $serviceCheckProviderName)
 * @method static \UhOh\ServiceCheckProvider\ServiceCheckProvider[] getServiceCheckProviders()
 * 
 * @see \UhOh\ServiceCheckProvider\ServiceCheckProviders
 */
class ServiceCheckProviders extends Facade
{
    /**
     * Get the ServiceCheckProviders class
     * 
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SCP::class;
    }
}